<?php
namespace App\Contracts\Repositories;

interface FeedbackRepository extends BaseRepository
{
	public function paginate();
   
}