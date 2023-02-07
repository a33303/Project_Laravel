<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\OrderSource\CreateRequest;
use App\Models\OrderSource;
use App\QueryBuilders\SourceQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class OrderUploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param SourceQueryBuilder $sourceQueryBuilder
     * @return View
     */
    public function index(SourceQueryBuilder $sourceQueryBuilder): View
    {
        return \view('upload.index', [
            'listSource' => $sourceQueryBuilder->getAll()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return \view('upload.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateRequest $request
     * @param OrderSource $orderSource
     * @return RedirectResponse
     */
    public function store(CreateRequest $request, OrderSource $orderSource): RedirectResponse
    {
        $orderSource = OrderSource::create($request->validated());
        if($orderSource) {
            return \redirect()->route('home')->with('success', __('messages.admin.order.success'));
        }
        return \back()->with('error', __('messages.admin.order.fail'));
        }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
