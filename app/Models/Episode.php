<?php
namespace App\Models;

/**
 */
class Episode extends Model
{
    /**
     * Resource constants.
     */
    protected const RESOURCE = 'episode';

    /**
     * @return string
     */
    public function resource(): string
    {
        return self::RESOURCE;
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function show($id)
    {
        $episode = $this->rickAndMortyAPI->get($this->resource(), $id);

        $episode['details'] = $this->getEpisodeDetails($episode);

        return $episode;
    }

    /**
     * @param $filters
     *
     * @return mixed
     */
    public function all($filters)
    {
        $results = $this->rickAndMortyAPI->getAll($this->resource(), $filters);

        $allEpisode = $results['results'];

        foreach ($allEpisode as $key => $episode) {
            $allEpisode[$key]['details'] = $this->getEpisodeDetails($episode);
        }

        $results['results'] = $allEpisode;

        return $results;
    }

    /**
     * @param $episode
     *
     * @return mixed
     */
    private function getEpisodeDetails($episode)
    {
        $episodeString = $episode['episode'];

        $season = substr($episodeString, strpos($episodeString, "S") + 1, strpos($episodeString, "E") - 1);
        $episode = substr($episodeString, strpos($episodeString, "E") + 1);

        return $this->ratingsAPI->getAll(
            [
                'season' => $season,
                'episode' => $episode,
            ]
        );
    }
}
