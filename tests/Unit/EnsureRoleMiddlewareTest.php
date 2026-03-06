<?php

use App\Http\Middleware\EnsureRole;
use Illuminate\Http\Request;

it('normalizes delimited roles for hasAnyRole checks', function (): void {
    $middleware = new EnsureRole();

    $request = Request::create('/admin', 'GET');

    $user = new class {
        public array $checkedRoles = [];

        public function hasAnyRole(array $roles): bool
        {
            $this->checkedRoles = $roles;

            return in_array('admin', $roles, true);
        }
    };

    $request->setUserResolver(fn () => $user);

    $response = $middleware->handle($request, fn () => response('ok'), 'editor|admin');

    expect($response->getContent())->toBe('ok');
    expect($user->checkedRoles)->toBe(['editor', 'admin']);
});
