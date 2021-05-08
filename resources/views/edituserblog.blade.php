<!DOCTYPE html>
<html>
<head>
	
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>

<h2 style="text-align: center;">User Blog Form</h2>
@if($errors->any)
<div class="alert alert-danger" style="color: red">
<ul>
@foreach($errors->all() as $error)
 <li>{{$error}}</li>
 @endforeach
</ul>
</div>
@endif
<div class="container">
  <form action="{{url('updatedata')}}" method="post" enctype="multipart/form-data">
 @csrf
  	<input type="hidden" name="id" value="{{$blogvalue['id']}}">
  	<div class="row">
      <div class="col-25">
        <label for="fname">Image</label>
      </div>
      <div class="col-75">
        <img src="{{asset('image/1620463205.jpg')}}">
       <input type="file"  value="{{$blogvalue['image_name']}}">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="fname">Title</label>
      </div>
      <div class="col-75">
        <input type="text" id="fname" name="title" placeholder="Your name.." value="{{$blogvalue['title']}}">
      </div>
    </div>
    <div class="row">
    <div class="row">
      <div class="col-25">
        <label for="subject">Description</label>
      </div>
      <div class="col-75">
        <textarea id="subject" name="description" placeholder="Write something.." style="height:200px">{{$blogvalue['description']}}</textarea>
      </div>
    </div>
      <div class="col-25">
        <label for="lname">Tag</label>
      </div>
      <div class="col-75">
        <input type="text" id="lname" name="tag" placeholder="Your last name.." value="{{$blogvalue['tag']}}">
      </div>
    </div>
   <hr/>
    <div class="row">
      <input type="submit" value="Submit">
    </div>
  </form>
</div>




</body>
</html>
