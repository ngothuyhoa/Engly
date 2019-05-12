<?php
namespace App\Contracts\Repositories;

interface ReportRepository extends BaseRepository
{
	public function paginate();
   
}