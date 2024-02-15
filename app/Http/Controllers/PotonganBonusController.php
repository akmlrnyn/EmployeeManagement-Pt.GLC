<?php

namespace App\Http\Controllers;

use App\Models\PotonganBonus;
use Illuminate\Http\Request;

class PotonganBonusController extends Controller
{
    public function edit($id) {
        $item = PotonganBonus::findOrFail($id);
        return view('pages.salary-slips.potonganbonus.edit', compact('item'));
    }

    public function update(Request $request, $id) {
        $data = $request->all();
        $item = PotonganBonus::findOrFail($id);

        $item->update($data);
        return redirect()->route('salary-slips.index');
    }
}
