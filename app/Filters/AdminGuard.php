<?php
namespace App\Filters;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
class AdminGuard implements FilterInterface
{
	public function before(RequestInterface $request, $arguments = null)
	{
		if (!session()->get('utilisateur') || !session()->get('utilisateur')['admin'] == 't')
		{
			return redirect()->to('/connexion');
		}
	}
	public function after(RequestInterface $request, ResponseInterface $response,
	$arguments = null)
	{}
}