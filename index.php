<?php ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Simple Calc</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0.0">
		<link rel="stylesheet" href="jquery.mobile-1.3.2-modified.css">
		<!-- <link rel="stylesheet" href="http://code.jquery.com/mobile/1.3.2/jquery.mobile.structure-1.3.2.css"> -->
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css">
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap-theme.min.css">
		<link rel="stylesheet" href="index.css">
		<script src="//code.jquery.com/jquery.min.js"></script>
		<script src="//code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.js"></script>
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js"></script>
		<script src="index.js"></script>
	</head>
	<body>
		<div data-role="page" class="main-container">
			<div data-role="panel" id="panel" data-display="overlay">
				<div class="row">
					<div class="col-xs-12">
						<button type="button" class="btn btn-block btn-default">Clear</button>
					</div>
				</div>
			</div>
			<div data-role="content">
				<div class="row">
					<div class="col-xs-4 no-padding">
						<button id="clear" type="button" class="btn btn-default btn-lg btn-block btn-warning">Clear</button>
					</div>
					<div class="col-xs-8 no-padding">
						<input id="display" type="text" class="form-control input-lg text-right" disabled
						placeholder="0.00">
					</div>
				</div>
				<div class="row">
					<div class="col-xs-4 no-padding">
						<button type="button" class="btn btn-default btn-lg btn-block number btn-primary">1</button>
					</div>
					<div class="col-xs-4 no-padding">
						<button type="button" class="btn btn-default btn-lg btn-block number btn-primary">2</button>
					</div>
					<div class="col-xs-4 no-padding">
						<button type="button" class="btn btn-default btn-lg btn-block number btn-primary">3</button>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-4 no-padding">
						<button type="button" class="btn btn-default btn-lg btn-block number btn-primary">4</button>
					</div>
					<div class="col-xs-4 no-padding">
						<button type="button" class="btn btn-default btn-lg btn-block number btn-primary">5</button>
					</div>
					<div class="col-xs-4 no-padding">
						<button type="button" class="btn btn-default btn-lg btn-block number btn-primary">6</button>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-4 no-padding">
						<button type="button" class="btn btn-default btn-lg btn-block number btn-primary">7</button>
					</div>
					<div class="col-xs-4 no-padding">
						<button type="button" class="btn btn-default btn-lg btn-block number btn-primary">8</button>
					</div>
					<div class="col-xs-4 no-padding">
						<button type="button" class="btn btn-default btn-lg btn-block number btn-primary">9</button>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-4 no-padding">
						<button type="button" class="btn btn-default btn-lg btn-block number btn-primary">0</button>
					</div>
					<div class="col-xs-4 no-padding">
						<button id="point" type="button" class="btn btn-default btn-lg btn-block number btn-primary">.</button>
					</div>
					<div class="col-xs-4 no-padding">
						<button id="save" type="button" class="btn btn-default btn-lg btn-block btn-success disabled">Save</button>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
