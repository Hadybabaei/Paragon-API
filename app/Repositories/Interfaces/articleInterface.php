<?php

namespace App\Repositories\Interfaces;

use Illuminate\Http\Request;

interface articleInterface 
{
    public function show();

    public function store(Request $request);
    
    public function update($id,Request $request);

    public function destroy($id);
}