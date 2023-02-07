<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Source\CreateRequest;
use App\Http\Requests\Source\EditRequest;
use App\Models\Source;
use App\QueryBuilders\SourceQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
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
     * @param CreateRequest $request
     * @return RedirectResponse
     */
    public function store(CreateRequest $request): RedirectResponse
    {
        $source = Source::create($request->validated());
        if ($source){
            return \redirect()->route('admin.source.index')->with('success',  __('messages.admin.source.success'));
        }

        return \back()->with('error',  __('messages.admin.source.fail'));
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
     * @param EditRequest $request
     * @param Source $source
     * @return RedirectResponse
     */
    public function update(EditRequest $request, Source $source): RedirectResponse
    {
        $source = $source->fill($request->validated());
        if ($source->save()) {
            return \redirect()->route('admin.source.index')->with('success',  __('messages.admin.source.success'));
        }
        return \back()->with('error',  __('messages.admin.source.fail'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Source $source
     * @return JsonResponse
     */
    public function destroy(Source $source): JsonResponse
    {
        try {
            $source->delete();

            return \response()->json('ok');
        } catch (\Exception $exception) {
            \Log::error($exception->getMessage(), [$exception]);
            return \response()->json('error',400 );
        }
    }
}
