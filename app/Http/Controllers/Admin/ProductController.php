<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\DeleteProductImageRequest;
use App\Http\Requests\Product\DeleteProductOptionRequest;
use App\Http\Requests\Product\DeleteProductSpecificationRequest;
use App\Http\Requests\Product\StoreProductImageRequest;
use App\Http\Requests\Product\StoreProductOptionRequest;
use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Requests\Product\StoreProductSpecificationRequest;
use App\Http\Requests\Product\UpdateProductCollectionsRequest;
use App\Http\Requests\Product\UpdateProductInfoRequest;
use App\Http\Requests\Product\UpdateProductOptionRequest;
use App\Http\Requests\Product\UpdateProductSpecificationRequest;
use App\Http\Requests\Product\UpdateProductStatusRequest;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    private Product $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $products = $this
            ->product
            ->select(['id', 'name', 'stock', 'status'])
            ->withAggregate('productImages', 'image')
            ->latest()
            ->all();

        return $this->product->sendResponse(
            "All products",
            $products,
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request): JsonResponse
    {
        $product = $this->product->create($request->validated());

        return $this->product->sendResponse(
            "Product created successfully",
            $product,
            Response::HTTP_CREATED
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        $product = $this->product->find($id);

        $this->product->isFound($product);

        return $this->product->sendResponse(
            "Product details",
            $product
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductInfoRequest $request, string $id): JsonResponse
    {
        $product = $this->product->find($id);

        $this->product->isFound($product);

        $clonedProduct = $product;

        $validated = $request->validated();

        $product->renameFolder($product->name, $validated['name']);

        $clonedProduct->updateImagePath($product->name, $validated['name']);

        $product->update($request->validated());

        return $this->product->sendResponse(
            "$product->name info updated",
            $product
        );
    }

    public function updateStatus(UpdateProductStatusRequest $request, string $id): JsonResponse
    {
        $product = $this->product->find($id);

        $this->product->isFound($product);

        $product->update($request->validated());

        return $this->product->sendResponse(
            "Status updated",
            $product
        );
    }

    public function showSpecification(string $id): JsonResponse
    {
        $product = $this->product->find($id);

        $this->product->isFound($product);

        return $this->product->sendResponse(
            "$product->name specifications",
            $product->productSpecifications
        );
    }

    public function storeSpecification(StoreProductSpecificationRequest $request, string $id): JsonResponse
    {
        $product = $this->product->find($id);

        $this->product->isFound($product);

        $product->productSpecifications()->create($request->validated());

        return $this->product->sendResponse(
            "$product->name specification added",
            $product->productSpecifications
        );
    }

    public function updateSpecification(UpdateProductSpecificationRequest $request, string $id): JsonResponse
    {
        $product = $this->product->find($id);

        $this->product->isFound($product);

        $product->productSpecifications()->update($request->validated());

        return $this->product->sendResponse(
            "$product->name specification updated",
            $product->productSpecifications
        );
    }

    public function deleteSpecification(DeleteProductSpecificationRequest $request, string $id): JsonResponse
    {
        $product = $this->product->find($id);

        $this->product->isFound($product);

        $product->productSpecifications()->delete($request->validated());

        return $this->product->sendResponse(
            "$product->name specification deleted",
            $product->productSpecifications
        );
    }

    public function showImage(string $id): JsonResponse
    {
        $product = $this->product->find($id);

        $this->product->isFound($product);

        return $this->product->sendResponse(
            "$product->name images",
            $product->productImages
        );
    }

    public function storeImage(StoreProductImageRequest $request, string $id): JsonResponse
    {
        $product = $this->product->find($id);

        $this->product->isFound($product);

        $image = $product->storeImage($request, Product::folder, imageFolder: $product->name);

        $product->productImages()->create([
            'image' => $image
        ]);

        return $this->product->sendResponse(
            "image uploaded successfully",
            $product->productImages
        );
    }

    public function deleteImage(DeleteProductImageRequest $request, string $id): JsonResponse
    {
        $product = $this->product->find($id);

        $this->product->isFound($product);

        $images = $request->validated('images');

        foreach ($images as $image) {
            $product->deleteImage($product->productImages->find($image)->image);
        }

        $product
            ->productImages()
            ->whereIn('id', $images)
            ->delete();

        return $this->product->sendResponse(
            "$product->name images deleted successfully",
            $product
                ->productImages()
                ->whereNot('id', $images)
                ->get()
        );
    }

    public function showOption(string $id): JsonResponse
    {
        $product = $this->product->find($id);

        $this->product->isFound($product);

        return $this->product->sendResponse(
            "$product->name options",
            $product->productOptions
        );
    }

    public function storeOption(StoreProductOptionRequest $request, string $id): JsonResponse
    {
        $product = $this->product->find($id);

        $this->product->isFound($product);

        $product->productOptions()->create($request->validated());

        return $this->product->sendResponse(
            "Option added",
            $product->productOptions
        );
    }

    public function updateOption(UpdateProductOptionRequest $request, string $id): JsonResponse
    {
        $product = $this->product->find($id);

        $this->product->isFound($product);

        $product->productOptions()->update($request->validated());

        return $this->product->sendResponse(
            "Option updated",
            $product->productOptions
        );
    }

    public function deleteOption(DeleteProductOptionRequest $request, string $id): JsonResponse
    {
        $product = $this->product->find($id);

        $this->product->isFound($product);

        $product
            ->productOptions()
            ->where('id', +$request->validated('option'))
            ->delete();

        return $this->product->sendResponse(
            "Option deleted",
            $product->productOptions
        );
    }

    public function showCollections(string $id): JsonResponse
    {
        $product = $this->product->find($id);

        $this->product->isFound($product);

        return $this->product->sendResponse(
            "$product->name collections",
            [
                'collections' => $product->collections->pluck('id')
            ]
        );
    }

    public function updateCollections(UpdateProductCollectionsRequest $request, string $id): JsonResponse
    {
        $product = $this->product->find($id);

        $this->product->isFound($product);

        $product->collections()
            ->sync(
                $request->validated('collections')
            );

        return $this->product->sendResponse(
            "Collections updated",
            $product->collections->pluck('id')
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        $product = $this->product->find($id);

        $this->product->isFound($product);

        foreach ($product->productImages as $image) {
            $product->deleteImage($image->image);
        }

        $product->deleteFolder($product->name);

        $product->delete();

        return $this->product->sendResponse(
            "Product deleted successfully",
        );
    }
}
