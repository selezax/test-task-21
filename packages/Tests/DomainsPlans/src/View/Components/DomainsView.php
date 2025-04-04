<?php

namespace Tests\DomainsPlans\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Tests\DomainsPlans\DomainsPlansServiceProvider;
use Tests\DomainsPlans\Models\Domain;

class DomainsView extends Component
{
    public function render(): View
    {
        return view(DomainsPlansServiceProvider::PREFIX_PACKAGE . '::components.domains', [
            'domains' => Domain::byAuthUser()->get()
        ]);
    }

}
