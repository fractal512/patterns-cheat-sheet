<?php

namespace App\Http\Controllers;

use App\DesignPatterns\Fundamental\PropertyContainer\BlogPost;
use App\DesignPatterns\Fundamental\PropertyContainer\PropertyContainer;
use Illuminate\Http\Request;

class FundamentalPatternsController extends Controller
{
    /**
     * Property Container Pattern
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function PropertyContainer()
    {
        $name = 'Property Container Pattern';
        $description = PropertyContainer::getDescription();

        $item = new BlogPost();

        $item->setTitle('Post title');
        $item->setCategoryId(10);

        $item->addProperty('view_count', 100);

        $item->addProperty('last_update', '2030-02-01');
        $add_last_update = clone $item;
        $item->addProperty('last_update', '2030-02-02');
        $change_last_update = clone $item;

        $item->addProperty('read_only', true);
        $add_read_only = clone $item;
        $item->deleteProperty('read_only');

        return view('dump',
            compact(
                'name',
                'description',
                'add_last_update',
                'change_last_update',
                'add_read_only',
                'item'
            )
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
