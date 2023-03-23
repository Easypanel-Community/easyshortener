<?php

namespace App\Http\Controllers;

use App\Models\Link;

class RedirectToUrl
{
    public function __invoke(Link $link)
    {
        abort_if(! $link->is_enabled, 403);

        $link->increment('redirects');

        return redirect()->to($link->url);
    }
}
