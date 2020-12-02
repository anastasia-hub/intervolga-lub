<div class="item">
    <div class="row">
        <div class="col-6">
            <img class="item-list_img" src="img/1.jpg" alt="Image">
        </div>
        <div class="col-6">
            <div class="row mb-3">
                <div class="col">
                    <h4><?= $tour['name'] ?></h4>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <h4><?= $tour['city'] ?></h4>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col">
                    <h4>Стоимость: <?= $tour['price'] ?> &#8381</h4>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col">
                    <h4>Длительность тура: <?= $tour['duration'] ?> ночей</h4>
                </div>
            </div>
            <div class="row mb-5 float-right">
                <div class="col mr-5 ">
                    <a href="#" class="btn btn-outline-success"><h4>Заказать</h4></a>
                </div>
            </div>                              
        </div>
    </div>
</div>