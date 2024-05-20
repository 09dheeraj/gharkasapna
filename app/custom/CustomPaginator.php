<?php

namespace App\custom;

use Illuminate\Pagination\LengthAwarePaginator;

class CustomPaginator extends LengthAwarePaginator
{
    public function render($view = null, $data = [])
    {
        $paginator = parent::render($view, $data);
        $paginator->appends(request()->all()); 
        
        $paginator->withPath(url()->current())->setPath(url()->current());
        $paginator->setMethod('POST');

        return $paginator->render();
    }
}
