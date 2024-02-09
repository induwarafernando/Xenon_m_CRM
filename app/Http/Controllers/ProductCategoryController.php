<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductCategoryRequest;
use App\Http\Requests\UpdateProductCategoryRequest;
use App\Models\ProductCategory;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('product_category.index', [
            'product_categories' => ProductCategory::orderBy('id', 'ASC')->paginate(10)
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    
    public function create()
    {
        return view('product_category.form', [
            'product_category' => new ProductCategory()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductCategoryRequest $request)
    {
        $validatedData = $request->validated();
        ProductCategory::create($validatedData);
        return redirect()->route('product_category.index')->with('success', 'Product Category created successfully');
    }
    
    /**
     * Display the specified resource.
     */
    public function show(ProductCategory $productCategory)
    {
        return view('product_category.show', [
            'product_category' => $productCategory
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductCategory $productCategory)
    {
        return view('product_category.form', [
            'product_category' => $productCategory
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(UpdateProductCategoryRequest $request, ProductCategory $productCategory)
    // {
    //     $validated = $request->validated(
    //         [
    //             'name' => 'required|string',
    //             'description' => 'required|string',
    //         ]
    //     );
    //     $productCategory->update($validated);
    //     return redirect()->route('product_category.index')->with('success', 'Product Category updated successfully');
    // }

/**
 * Update the specified resource in storage.
 */
public function update(UpdateProductCategoryRequest $request, ProductCategory $productCategory)
{
    // Validate the request and get the validated data
    $validatedData = $request->validated();

    // Now you can safely update the product category with the validated data
    $productCategory->update($validatedData);

    return redirect()->route('product_category.index')->with('success', 'Product Category updated successfully');
}
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductCategory $productCategory)
    {
        $productCategory->delete();

        return redirect()->route('product_category.index')->with('success', 'Product Category deleted successfully');
        
        

    }
}