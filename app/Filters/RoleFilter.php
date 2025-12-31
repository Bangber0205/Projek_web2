<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class RoleFilter implements FilterInterface
{
    /**
     * @param array|null $arguments
     *
     * @return RedirectResponse|void
     */
    public function before(RequestInterface $request, $arguments = null)
    {
        $authenticate = service('authentication');
        $authorize = service('authorization');
        
        // If no user is logged in then send them to the login form.
        if (!$authenticate->check()) {
            session()->set('redirect_url', current_url());
            return redirect()->to('/login');
        }

        if (empty($arguments)) {
            return;
        }

        $userId = $authenticate->id();
        
        // Check each requested group
        foreach ($arguments as $group) {
            if ($authorize->inGroup($group, $userId)) {
                return;
            }
        }

        // User doesn't have required role
        return redirect()->to('/')->with('error', 'Anda tidak memiliki akses ke halaman ini.');
    }

    /**
     * Allows After filters to inspect and modify the response
     * object as needed. This method does not allow any way
     * to stop execution of other after filters, short of
     * throwing an Exception or Error.
     *
     * @param array|null $arguments
     *
     * @return void
     */
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do nothing
    }
}
