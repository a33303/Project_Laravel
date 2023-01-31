<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrderSource;
use App\QueryBuilders\OrderSourceQueryBuilder;
use Illuminate\Contracts\View\View;
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
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'user_name' => 'required',
        ]);

        $source = new OrderSource($request->except('_token'));

        if ($source->save()){
            return \redirect()->route('admin.orders.index')->with('success', 'Заказ успешно добавлен');
        }

        return \back()->with('error', 'Не удалось сохранить запись');
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
        $orderSource = $orderSource->fill($request->except('_token'));
        if ($orderSource->save()) {
            return \redirect()->route('admin.orders.index')->with('success', 'Заказ успешно добавлен');
        }
        return \back()->with('error', 'Не удалось сохранить запись');
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
