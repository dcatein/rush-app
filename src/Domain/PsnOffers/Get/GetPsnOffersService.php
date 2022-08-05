<?php

namespace Src\Domain\PsnOffers\Get;

use Src\Application\Repositories\FileRepository;
use Src\Application\Repositories\PsnRepository;

class GetPsnOffersService
{
    /**
     * @var PsnRepository
     */
    private PsnRepository $repository;

    /**
     * @var FileRepository
     */
    private FileRepository $fileRepository;

    /**
     * @param PsnRepository $repository
     * @param FileRepository $fileRepository
     */
    public function __construct(PsnRepository $repository,
                                FileRepository $fileRepository)
    {
        $this->repository = $repository;
        $this->fileRepository = $fileRepository;
    }

    public function __invoke()
    {
        $response = $this->repository->getOffers();

        $offerInfo = $this->getOfferInfo($response);

        while(!$this->isLast($response))
        {
            $response = $this->repository->getOffers($this->getOffset($response));
            $offerInfo['products'] = array_merge($offerInfo['products'], $this->getProducts($response));
        }

        $file = $this->fileRepository->getFile(sprintf('Offers/%s.json',  $offerInfo['id']));

        $this->fileRepository->addNewLine($file, json_encode($offerInfo, JSON_PRETTY_PRINT));
        $this->fileRepository->closeFile($file);

        //TODO: Ajustar Response
        return ['status' => 'sucesso'];
    }

    private function getProducts(array $data)
    {
        return $data['data']['categoryGridRetrieve']['products'];
    }

    private function getOfferInfo(array $data): array
    {
        //TODO: Transformar em objeto

        return[
            'id'=> $data['data']['categoryGridRetrieve']['id'],
            'localizedName' => $data['data']['categoryGridRetrieve']['localizedName'],
            'reportingName' => $data['data']['categoryGridRetrieve']['reportingName'],
            'products' => $this->getProducts($data)
        ];
    }

    private function isLast(array $data): bool
    {
        return $data['data']['categoryGridRetrieve']['pageInfo']['isLast'];
    }

    private function getOffset(array $data)
    {
        return $data['data']['categoryGridRetrieve']['pageInfo']['size']+
            $data['data']['categoryGridRetrieve']['pageInfo']['offset'];
    }
}
