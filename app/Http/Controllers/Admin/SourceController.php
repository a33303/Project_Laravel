<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Source;
use App\QueryBuilders\SourceQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param SourceQueryBuilder $sourceQueryBuilder
     * @return View
     */
    public function index(SourceQueryBuilder $sourceQueryBuilder): View
    {
//        $model = new Source();
//        $listSource = $model->getSources();

        return \view('admin.source.index', [
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
        return \view('admin.source.create');
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
            'name_source' => 'required',
        ]);

        $source = new Source($request->except('_token'));

        if ($source->save()){
            return \redirect()->route('admin.source.index')->with('success', 'Источник успешно добавлен');
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
     * @param Source $source
     * @return View
     */
    public function edit(Source $source): View
    {
        return \view('admin.source.edit', [
            'source' => $source
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Source $source
     * @return RedirectResponse
     */
    public function update(Request $request, Source $source): RedirectResponse
    {
        $source = $source->fill($request->except('_token'));
        if ($source->save()) {
            return \redirect()->route('admin.source.index')->with('success', 'Источник успешно добавлен');
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
