<?php
namespace App\Filters;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use App\Models\AchatModel;
use App\Models\ProgrammeModel;
class AbonnementMultimediaGuard implements FilterInterface
{
	public function before(RequestInterface $request, $arguments = null)
	{
		$achatModel = new AchatModel();
		$programmeModel = new ProgrammeModel();

		if (!session()->get('utilisateur'))
		{
			return redirect()->to('/connexion');
		}
		$achats = $achatModel->where('idsaiyan', session()->get('utilisateur')['id'])->find();
		$good = false;
		foreach ($achats as $achat) {
			$programme = $programmeModel->where('id', $achat['idproduit'])->find();
			if ($programme['multimedia'] == 't') {
				$good = true;
			}
		}
		if (!$good)
		{
			return redirect()->to('/');
		}
	}
	public function after(RequestInterface $request, ResponseInterface $response,
	$arguments = null)
	{}
}