<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

trait PaginatorTrait 
{
	private function getPaginator(Request $request, $items) 
	{
	    $total = count($items); // total count of the set, this is necessary so the paginator will know the total pages to display
	    $page = $request->page ? $request->page : 1; // get current page from the request, first page is null
	    $perPage = 5; // how many items you want to display per page?
	    $offset = ($page - 1) * $perPage; // get the offset, how many items need to be "skipped" on this page
	 
	    $items = array_slice($items, $offset, $perPage); // the array that we actually pass to the paginator is sliced

	    return new LengthAwarePaginator($items, $total, $perPage, $page, [
	        'path' => $request->url(),
	        'query' => $request->query()
	    ]);
	}
}

