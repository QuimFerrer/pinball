<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="//w2ui.com/src/w2ui-1.3.min.css" />
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
    <script type="text/javascript" src="//w2ui.com/src/w2ui-1.3.min.js"></script>
</head>
<body>
    <div id="myForm" style="width: 600px">
		<div class="w2ui-page page-0">
			<div class="w2ui-label">First Name:</div>
			<div class="w2ui-field">
				<input name="first_name" maxlength="100" size="60"/>
			</div>
			<div class="w2ui-label">Last Name:</div>
			<div class="w2ui-field">
				<input name="last_name" maxlength="100" size="60"/>
			</div>
			<div class="w2ui-label">Text Area:</div>
			<div class="w2ui-field">
				<textarea name="comments" style="width: 385px; height: 80px;"></textarea>
			</div>
			<div class="w2ui-label">List:</div>
			<div class="w2ui-field">
				<select name="fields" style="width: 385px;">
<!-- 					<option value="1">Un</option>
					<option value="2">Dos</option>
					<option value="3">Tres</option> -->
				</select>
			</div>
		</div>
		<div class="w2ui-buttons">
			<input type="button" value="Reset" name="reset"/>
			<input type="button" value="Save" name="save"/>
		</div>
	</div>
</body>
<script>
$(function () {
	$('#myForm').w2form({ 
		name   : 'dialog',
		url    : 'server/post',
		fields : [
			{ name: 'first_name', type: 'text', required: false },
			{ name: 'last_name',  type: 'text', required: false },
			{ name: 'comments',   type: 'text'},
			{ name: 'fields', type: 'select', required: false, 
				options: { 
					items: [{"id": 1, "text":'Un'}, {"id": 2, "text":'Dos'}, {"id": 3, "text":'Tres'}]
				} 
			}
		],
		actions: {
			reset: function () {
				this.clear();
			},
			save: function () {
				this.save();
			}
		},
		onRefresh: function(e){
			e.isStopped=true;
			// if(e.target=="fields")
				// w2ui['dialog'].off('change');
			   // e.preventDefault();
		}
	});

    w2ui['dialog'].on('*', function (event) {
    	console.log('Event: '+ event.type, 'Target: '+ event.target, event);
    });
});
</script>
</html>


<!-- options: {
	url         : '',       // url to load items, JSON: { "items": [{ "id": 1, "text": "item 1" }];
	items       : [],       // array of items - item: { id, text }
	value       : '',       // value for the select
	showNone    : false     // shows first element - none - with empty value
} -->