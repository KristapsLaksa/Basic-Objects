<?php

class Application{
    private VideoStore $store;

    public function __construct(){
        $this->store = new VideoStore();
    }

    public function run():void
    {
        while (true){
            echo "Choose the option \n";
            echo "Choose 0 to EXIT \n";
            echo "Choose 1 to fill video store \n";
            echo "Choose 2 to rent a video \n";
            echo "Choose 3 to return video \n";
            echo "choose 4 to list inventory \n";

            $command = (int)readline();

            switch ($command){
                case 0:
                    echo "Bye!";
                    die;
                case 1:
                    $this->addVideo();
                    break;
                case 2:
                    $this->rentVideo();
                case 3:
                    $this->returnVideo();
                case 4:
                    $this->listInventory($this->store->getAvailableVideos());
                    break;
                default:
                    echo "Wrong command!";
            }
        }
    }
    private function addVideo():void{
        $movieTitle=readline('Enter movie title: ');
        $this->store->add(new Video($movieTitle));
    }
    private function rentVideo():void{
        $this->listInventory($this->store->getAvailableVideos());

        $inventory = $this->store->getAvailableVideos();

        $selectedNumber = (int) readline('Enter movie number : ');

        $selectedVideo =$inventory[$selectedNumber];

        $this->store->rentVideo($selectedVideo);
    }
    private function returnVideo():void{
        $this->listInventory($this->store->getRentedVideos());
        $inventory = $this->store->getRentedVideos();

        if(empty($inventory)) return;
        $selectedNumber = (int) readline('Enter movie number : ');
        $selectedVideo = $inventory[$selectedNumber];
        $this->store->returnVideo($selectedVideo);
        $rating = (float)readline('Enter rating: ');
        $selectedVideo->receiveRating($rating);
    }
    private function listInventory(array $videos):void{
        foreach($videos as $number=>$video){
            echo "[{$number}] - {$video->getTitle()} / {$video->averageRating()}".PHP_EOL;
        }
    }
}


class VideoStore {
private array $availableVideos = [];
private array $rentedVideos = [];

public function add(Video $video):void{
    $this->availableVideos[]=$video;
}
public function rentVideo(Video $video):void{
    if(($key = array_search($video,$this->availableVideos))!== false){
        unset($this->availableVideos[$key]);
        $this->rentedVideos[]=$video;
    }
}
public function returnVideo(Video $video):void{
    if(($key = array_search($video,$this->rentedVideos))!== false){
        unset($this->rentedVideos[$key]);
        $this->availableVideos[]=$video;
    }
    }
public function getAvailableVideos(): array
    {
        return $this->availableVideos;
    }


public function getRentedVideos(): array
    {
        return $this->rentedVideos;
    }

}

class Video {
    private string $title;
    private array $ratings = [];

    public function __construct(string $title){
        $this->title=$title;

    }

    public function getTitle(): string
    {
        return $this->title;
    }
    public function receiveRating(float $rating){
        $this->ratings[]=$rating;
    }
    public function averageRating():float{
        if(count($this->ratings)===0) return 0;
        return array_sum($this->ratings)/count($this->ratings);
    }
}

$app =new Application();
$app->run();