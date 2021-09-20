<?php declare(strict_types=1);

namespace App\Models;

use Faker\Factory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Collection;

class FeedBack extends Model
{
	protected $table = "feedbacks";

	protected $fillable = [
		'news_id', 'name', 'email', 'feedback'
	];

	public function getFeedBack(int $idNews)
	{
		return FeedBack::where([
			['news_id', '=', $idNews]
		])->paginate(config('feedback.paginate'));
	}

	public function news(): BelongsTo
	{
		return $this->belongsTo(News::class, 'news_id', 'id');
	}
}
