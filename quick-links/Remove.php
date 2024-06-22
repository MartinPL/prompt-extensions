<?php

namespace Extensions\QuickLinks;

class Remove
{
    public function __invoke($id)
    {
        QuickLinks::meta('items')->delete(id: $id);

        return redirect()->back();
    }
}
