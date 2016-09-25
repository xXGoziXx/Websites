<!DOCTYPE html>
<html>
<head lang="en">
<meta charset="UTF-8">
<title>AngularJS Tutorial</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.4/angular.min.js"></script>
<script src ="app.js"></script>
<script src ="main.ctrl.js"></script>
</head>
<body ng-app="app" ng-controller="MainController as main">
<div class="container">
<h1>{{main.title}}</h1>
<div class="input-group">
<span class="input-group-addon">
<span class="glyphicon glyphicon-search"></span>
</span>
<input type="text" class="form-control" ng-model="main.searchInput">
</div>
<h3>A list of TV shows</h3>
<ul class="list-group">
<?php
	//echo '<li class="list-group-item" ng-repeat="show in main.shows | filter:main.searchInput | orderBy:main.order.key:main.order.reverse">{{show.title}}<span class="badge">{{show.year}}</span></li>';
	$json_string = file_get_contents("info.json");
	$parsed_json = json_decode($json_string, true);
	foreach($parsed_json as $array)
	{
		foreach ($array as $key => $value) {
			echo '<li class="list-group-item"><span class="glyphicon glyphicon-star" ng-if="' . $value["favorite"] . '"></span>' . $value["title"] . '<span class="badge">' . $value["year"] . '</span></li>';
			
			//echo $value["favourite"];;
		}
		
	}
?>

</ul>
<select class="form-control pull-right" ng-model="main.order" ng-options="order as order.title for order in main.orders"></select>
<div class="clearfix"></div>
<h3>Add a new TV show</h3>
<form name="main.addForm" class="form" ng-submit="main.addShow()">
<div class="form-group">
<label>Title</label>
<input type="text" class="form-control" ng-model="main.new.title" required />
</div>
<div class="form-group">
<label>Year</label>
<input type="number" min="1900" max="2030" class="form-control" ng-model="main.new.year" required />
</div>
<div class="row">
<div class="col-xs-6">
<label>Favourite: <input type="checkbox" ng-model="main.new.favourite" /></label>
</div>
<div class="col-xs-6">
<button class="btn btn-success pull-right"><span class="glyphicon glyphicon-plus-sign"></span> Add</button>
</div>
</div>
</form>

</div>

</body>
</html>
