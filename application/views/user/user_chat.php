<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <style media="screen">
  .main-section{
border: 1px solid #000;
}
.left-sidebar{
background-color:#3A3A3A;
padding: 0px;
}
.searchbox{
width: 100%;
padding:27px 10px;
border-bottom:2px solid #000;
}
.form-control,.search-icon,.search-icon:hover{
background-color: #6A6C75;
border:1px solid #fff;
color:#fff;
box-shadow: none !important;
}
.form-control:focus{
border:1px solid #fff;
}
.chat-left-img,.chat-left-detail{
float: left;
}
.left-chat{
overflow-y:scroll;
}
.left-chat ul{
overflow: hidden;
padding: 0px;
}
.left-chat ul li{
list-style: none;
width:100%;
float: left;
margin:10px 0px 8px 15px;
}
.chat-left-img img{
width:50px;
height:50px;
border-radius: 50%;
text-align: left;
float:fixed;
border:3px solid #6B6F79;
}
.chat-left-detail{
margin-left: 10px;
}
.chat-left-detail p{
margin: 0px;
color:#fff;
padding:7px 0px 0px;
}
.chat-left-detail span{
color:#B8BAC3;
}
.chat-left-detail span i{
color:#86BB71;
font-size: 10px;
}
.chat-left-detail .orange{
color:#E38968;
}
.right-sidebar{
border-left:2px solid #000;
}
.right-header{
border-bottom:2px solid #000;
margin:0px;
padding: 0px;
}
.right-header-img img{
width:50px;
height:50px;
float: left;
border-radius: 50%;
border:3px solid #61BC71;
margin-right: 10px;
}
.right-header{
padding:20px;
height:90px;
background-color:#3A3A3A;
}
.right-header-detail p{
margin: 0px;
color:#fff;
font-weight: bold;
padding-top:5px;
}
.right-header-detail span{
color:#9FA5AF;
font-size: 12px;
}
.rightside-left-chat,.rightside-right-chat{
float:left;
width:80%;
position: relative;
}
.rightside-right-chat{
float:right;
margin-right:35px;
}
.right-header-contentChat{
overflow-y: scroll;
background-color: #FFFFFF;
position: relative;
}
.right-header-contentChat ul li{
list-style: none;
margin-top:20px;
}
.right-header-contentChat .rightside-left-chat p,.right-header-contentChat .rightside-right-chat p{
background-color: #86BB71;
padding:15px;
border-radius:8px;
color:#fff;
}
.right-header-contentChat .rightside-right-chat p{
background-color: #94C2ED;
}
.right-chat-textbox{
padding: 15px 30px;
width: 100%;
background-color: #3A3A3A;
}
.right-chat-textbox input{
width:88%;
height:40px;
color:#9FA5AF;
border-radius:5px;
padding: 0px 10px;
border:1px solid #c1c1c1;
}
.right-chat-textbox a i{
color:#3A3A3A;
text-align: center;
height:40px;
width:40px;
background-color:#fff;
border-radius: 50%;
padding:12px 0px;
margin-left:20px;
}
.rightside-left-chat span i,.rightside-right-chat span i{
color: #86BB71;
font-size: 12px;
}
.rightside-right-chat span i{
color:#94C2ED;
}
.rightside-right-chat span{
float:right;
}
.rightside-right-chat span small,.rightside-left-chat span small{
color:#BDBDC2;
}
.rightside-left-chat:before{
content: " ";
position:absolute;
top:14px;
left:15px;
bottom:150px;
border:15px solid transparent;
border-bottom-color:#86BB71;
z-index: 1;
}
.rightside-right-chat:before{
content: " ";
position:absolute;
top:14px;
right:15px;
bottom:150px;
border:15px solid transparent;
border-bottom-color:#94C2ED;
}
@media only screen and (max-width:320px){
.main-section{
  display: none;
}
}
  </style>
  <script type="text/javascript">
  $(document).ready(function(){
    var height = $(window).height();
    $('.left-chat').css('height', (height - 92) + 'px');
    $('.right-header-contentChat').css('height', (height - 163) + 'px');
  });
  </script>

</head>


<body>
	<div class="container main-section">
		<div class="row">
			<div class="col-md-3 col-sm-3 col-xs-12 left-sidebar">
				<div class="input-group searchbox">
					<input class="form-control" placeholder="Search" name="srch-term" id="srch-term" type="text">
					<div class="input-group-btn">
						<button class="btn btn-default search-icon" type="submit"><i class="glyphicon glyphicon-search"></i></button>
					</div>
				</div>
				<div class="left-chat">
					<ul>
						<li>
							<div class="chat-left-img">
								<img src="/demo/businessman.png">
							</div>
							<div class="chat-left-detail">
								<p>luis yankee</p>
								<span><i class="fa fa-circle" aria-hidden="true"></i> online</span>
							</div>
						</li>
						<li>
							<div class="chat-left-img">
								<img src="/demo/index.jpg">
							</div>
							<div class="chat-left-detail">
								<p>joi chak</p>
								<span><i class="fa fa-circle" aria-hidden="true"></i> online</span>
							</div>
						</li>
						<li>
							<div class="chat-left-img">
								<img src="/demo/1499345224_female1.png">
							</div>
							<div class="chat-left-detail">
								<p>lajy ion</p>
								<span><i class="fa fa-circle orange" aria-hidden="true"></i> offline</span>
							</div>
						</li>
						<li>
							<div class="chat-left-img">
								<img src="/demo/man01.png">
							</div>
							<div class="chat-left-detail">
								<p>lod kine</p>
								<span><i class="fa fa-circle" aria-hidden="true"></i> online</span>
							</div>
						</li>
						<li>
							<div class="chat-left-img">
								<img src="/demo/1499344631_malecostume.png">
							</div>
							<div class="chat-left-detail">
								<p>nik minaj</p>
								<span><i class="fa fa-circle orange" aria-hidden="true"></i> offline</span>
							</div>
						</li>
						<li>
							<div class="chat-left-img">
								<img src="/demo/1499345471_boy.png">
							</div>
							<div class="chat-left-detail">
								<p>Win sina</p>
								<span><i class="fa fa-circle" aria-hidden="true"></i> online</span>
							</div>
						</li>
						<li>
							<div class="chat-left-img">
								<img src="/demo/index.jpg">
							</div>
							<div class="chat-left-detail">
								<p>joi chak</p>
								<span><i class="fa fa-circle" aria-hidden="true"></i> online</span>
							</div>
						</li>
						<li>
							<div class="chat-left-img">
								<img src="/demo/1499345224_female1.png">
							</div>
							<div class="chat-left-detail">
								<p>lajy ion</p>
								<span><i class="fa fa-circle orange" aria-hidden="true"></i> offline</span>
							</div>
						</li>
						<li>
							<div class="chat-left-img">
								<img src="/demo/man01.png">
							</div>
							<div class="chat-left-detail">
								<p>lod kine</p>
								<span><i class="fa fa-circle" aria-hidden="true"></i> online</span>
							</div>
						</li>
						<li>
							<div class="chat-left-img">
								<img src="/demo/1499344631_malecostume.png">
							</div>
							<div class="chat-left-detail">
								<p>nik minaj</p>
								<span><i class="fa fa-circle orange" aria-hidden="true"></i> offline</span>
							</div>
						</li>
						<li>
							<div class="chat-left-img">
								<img src="/demo/1499345471_boy.png">
							</div>
							<div class="chat-left-detail">
								<p>Win sina</p>
								<span><i class="fa fa-circle" aria-hidden="true"></i> online</span>
							</div>
						</li>
					</ul>
				</div>
			</div>
			<div class="col-md-9 col-sm-9 col-xs-12 right-sidebar">
				<div class="row">
					<div class="col-md-12 right-header">
						<div class="right-header-img">
							<img src="/demo/businessman.png">
						</div>
						<div class="right-header-detail">
							<p>Jack Clerk</p>
							<span>already 19 messages </span>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 right-header-contentChat">
						<ul>
							<li>
								<div class="rightside-left-chat">
									<span><i class="fa fa-circle" aria-hidden="true"></i> joi chak <small>10:00 AM,Today</small> </span><br><br>
									<p>Lorem ipsum dolor sit ameeserunt mollit anim id est laborum.
									Lorem ipsum dolor sit ameeserunt mollit anim mollit anim laborum.
									Lorem ipsum dolor sit ameeserunt mollit anim id est laborum.</p>
								</div>
							</li>
							<li>
								<div class="rightside-right-chat">
									<span> <small>10:00 AM,Today</small>  nik minaj <i class="fa fa-circle" aria-hidden="true"></i></span><br><br>
									<p>Lorem ipsum dolor sit ameeserunt mollit anim id est laborum.
									Lorem ipsum dolor sit ameeserunt mollit anim id est laborum.</p>
								</div>
							</li>
							<li>
								<div class="rightside-left-chat">
									<span><i class="fa fa-circle" aria-hidden="true"></i> joi chak <small>10:00 AM,Today</small> </span><br><br>
									<p>Lorem ipsum dolor sit ameeserunt mollit anim id est laborum.
									Lorem ipsum dolor sit ameeserunt mollit anim mollit anim laborum.
									Lorem ipsum dolor sit ameeserunt mollit anim id est laborum.</p>
								</div>
							</li>
							<li>
								<div class="rightside-right-chat">
									<span> <small>10:00 AM,Today</small>  nik minaj <i class="fa fa-circle" aria-hidden="true"></i></span><br><br>
									<p>Lorem ipsum dolor sit ameeserunt mollit anim id est laborum.
									Lorem ipsum dolor sit ameeserunt mollit anim id est laborum.</p>
								</div>
							</li>
							<li>
								<div class="rightside-left-chat">
									<span><i class="fa fa-circle" aria-hidden="true"></i> joi chak <small>10:00 AM,Today</small> </span><br><br>
									<p>Lorem ipsum dolor sit ameeserunt mollit anim id est laborum.
									Lorem ipsum dolor sit ameeserunt mollit anim mollit anim laborum.
									Lorem ipsum dolor sit ameeserunt mollit anim id est laborum.</p>
								</div>
							</li>
							<li>
								<div class="rightside-right-chat">
									<span> <small>10:00 AM,Today</small>  nik minaj <i class="fa fa-circle" aria-hidden="true"></i></span><br><br>
									<p>Lorem ipsum dolor sit ameeserunt mollit anim id est laborum.
									Lorem ipsum dolor sit ameeserunt mollit anim id est laborum.</p>
								</div>
							</li>
							<li>
								<div class="rightside-left-chat">
									<span><i class="fa fa-circle" aria-hidden="true"></i> joi chak <small>10:00 AM,Today</small> </span><br><br>
									<p>Lorem ipsum dolor sit ameeserunt mollit anim id est laborum.
									Lorem ipsum dolor sit ameeserunt mollit anim mollit anim laborum.
									Lorem ipsum dolor sit ameeserunt mollit anim id est laborum.</p>
								</div>
							</li>
							<li>
								<div class="rightside-right-chat">
									<span> <small>10:00 AM,Today</small>  nik minaj <i class="fa fa-circle" aria-hidden="true"></i></span><br><br>
									<p>Lorem ipsum dolor sit ameeserunt mollit anim id est laborum.
									Lorem ipsum dolor sit ameeserunt mollit anim id est laborum.</p>
								</div>
							</li>
							<li>
								<div class="rightside-left-chat">
									<span><i class="fa fa-circle" aria-hidden="true"></i> joi chak <small>10:00 AM,Today</small> </span><br><br>
									<p>Lorem ipsum dolor sit ameeserunt mollit anim id est laborum.
									Lorem ipsum dolor sit ameeserunt mollit anim mollit anim laborum.
									Lorem ipsum dolor sit ameeserunt mollit anim id est laborum.</p>
								</div>
							</li>
							<li>
								<div class="rightside-right-chat">
									<span> <small>10:00 AM,Today</small>  nik minaj <i class="fa fa-circle" aria-hidden="true"></i></span><br><br>
									<p>Lorem ipsum dolor sit ameeserunt mollit anim id est laborum.
									Lorem ipsum dolor sit ameeserunt mollit anim id est laborum.</p>
								</div>
							</li>
						</ul>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 right-chat-textbox">
						<input type="text"><a href="#"><i class="fa fa-arrow-right" aria-hidden="true"></i></a>
					</div>
				</div>
			</div>
		</div>
	</div>

</body>
</html>
