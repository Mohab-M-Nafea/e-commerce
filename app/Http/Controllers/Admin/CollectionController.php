<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Collection\StoreCollectionImageRequest;
use App\Http\Requests\Collection\StoreCollectionRequest;
use App\Http\Requests\Collection\UpdateCollectionInfoRequest;
use App\Http\Requests\Collection\UpdateCollectionStatusRequest;
use App\Models\Collection;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class CollectionController extends Controller
{
    private Collection $collection;

    public function __construct(Collection $collection)
    {
        $this->collection = $collection;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $collections = $this
            ->collection
            ->select(['id', 'title', 'status',])
            ->latest()
            ->withCount('products')
            ->all();

        return $this->collection->sendResponse(
            "All collections",
            $collections,
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCollectionRequest $request): JsonResponse
    {
        $validated = $request->validated();
        $validated["url"] = $request->validated('title');

        $collection = $this->collection->create($validated);

        return $this->collection->sendResponse(
            "Collection created successfully",
            $collection,
            Response::HTTP_CREATED
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        $collection = $this
            ->collection
            ->select(['title', 'url', 'description', 'status'])
            ->find($id);

        $this->collection->isFound($collection);

        return $this->collection->sendResponse(
            "$collection->title collection",
            $collection
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateStatus(UpdateCollectionStatusRequest $request, string $id): JsonResponse
    {
        $collection = $this->collection->find($id);

        $this->collection->isFound($collection);

        $collection->update($request->validated());

        return $this->collection->sendResponse(
            "Status Updated",
            $collection
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCollectionInfoRequest $request, string $id): JsonResponse
    {
        $collection = $this
            ->collection
            ->select(['title', 'url', 'description', 'status'])
            ->find($id);

        $this->collection->isFound($collection);

        $validated = $request->validated();

        $collection->renameFolder($collection->title, $validated['title']);

        $collection->updateImagePath($collection->title, $validated['title']);

        $collection->update($validated);

        return $this->collection->sendResponse(
            "Collection Info Updated",
            $collection
        );
    }

    public function showImage(string $id): JsonResponse
    {
        $collection = $this
            ->collection
            ->select(['image'])
            ->find($id);

        $this->collection->isFound($collection);

        return $this->collection->sendResponse(
            "$collection->title image",
            $collection
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function storeImage(StoreCollectionImageRequest $request, string $id): JsonResponse
    {
        $collection = $this->collection->find($id);

        $this->collection->isFound($collection);

        $image = $collection->storeImage($request, Collection::folder);

        $collection->update([
            'image' => $image
        ]);

        return $this->collection->sendResponse(
            "Image uploaded successfully",
            $collection
        );
    }

    public function showProducts(string $id): JsonResponse
    {
        $collection = $this->collection->find($id);

        $this->collection->isFound($collection);

        $products = $collection
            ->products()
            ->withAggregate('productImages', 'image')
            ->get();

        return $this->collection->sendResponse(
            "$collection->title products",
            $products
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        $collection = $this->collection->find($id);

        $this->collection->isFound($collection);

        $collection->deleteImage($collection->image);

        $collection->deleteFolder($collection->title);

        $collection->delete();

        return $this->collection->sendResponse(
            "Collection deleted successfully",
        );
    }

    public function deleteImage(string $id): JsonResponse
    {
        $collection = $this->collection->find($id);

        $this->collection->isFound($collection);

        $collection->deleteImage($collection->image);

        $collection->update([
            'image' => null
        ]);

        return $this->collection->sendResponse(
            "$collection->title image deleted",
            $collection
        );
    }
}
