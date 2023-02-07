<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderSource\EditRequest;
use App\Models\OrderSource;
use App\Models\Source;
use App\QueryBuilders\OrderSourceQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OrderSourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param OrderSourceQueryBuilder $orderSourceQueryBuilder
     * @return View
     */
    public function index(OrderSourceQueryBuilder $orderSourceQueryBuilder): View
    {
        return \view('admin.orders.index', [
            'listOrderSource' => $orderSourceQueryBuilder->getAll()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param EditRequest $request
     * @return RedirectResponse
     */
    public function store(EditRequest $request): RedirectResponse
    {
        // *** Реализовать добавление заказа из админки
        $orderSource = OrderSource::create($request->validated());
        if ($orderSource){
            return \redirect()->route('admin.orders.index')->with('success',  __('messages.admin.order.success'));
        }

        return \back()->with('error',  __('messages.admin.order.fail'));
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
     * @param OrderSource $orderSource
     * @return View
     */
    public function edit(OrderSource $orderSource): View
    {
        return \view('admin.orders.edit', [
            'orderSource' => $orderSource
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param OrderSource $orderSource
     * @return RedirectResponse
     */
    public function update(Request $request, OrderSource $orderSource): RedirectResponse
    {
        $orderSource = $orderSource->fill($request->validated());
        if ($orderSource->save()){
            return \redirect()->route('admin.orders.index')->with('success',  __('messages.admin.order.success'));
        }

        return \back()->with('error',  __('messages.admin.order.fail'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param OrderSource $orderSource
     * @return JsonResponse
     */
    public function destroy(OrderSource $orderSource): JsonResponse
    {
        try {
            $orderSource->delete();

            return \response()->json('ok');
        } catch (\Exception $exception) {
            \Log::error($exception->getMessage(), [$exception]);
            return \response()->json('error',400 );
        }
    }
}
