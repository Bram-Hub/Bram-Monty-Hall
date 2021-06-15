<!DOCTYPE HTML>
<html>
<div class="scrollPage">
	<link rel="stylesheet" href="{{ asset('css/education.css') }}">

	<script type="text/javascript">

	</script>
	<link rel="images" href="{{ asset('images/') }}">
	<div class="header">
		<ul>
			<li> <a href="https://github.com/Bram-Hub/Monty-Hall"> <u>BramHub</u> </a> </li>
			<li> <a href="play">Play</a> </li>
			<li> <a href="research">Research</a> </li>
			<li> <a href="database">Database</a> </li>
			<li> <a href="education">Education</a> </li>
			<li> <a href="about">About</a> </li>
		</ul>
	</div>

	<div class="lets-deal">
		<p class="title"> Let's Make A Deal </p>
		<img class="dealImage" src="images/851-300x200.jpg" alt="image">
		<img class="dealImage2" src="images/946-200x300.jpg" alt="image">
    <p class="text"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin nec libero tortor. Praesent ut eros nisl. Sed pretium quis purus ac placerat. Fusce tincidunt placerat ex et commodo. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Ut laoreet ante lorem, gravida rutrum risus facilisis vel. Morbi tortor massa, consequat ut eros sit amet, rutrum dapibus erat. Suspendisse finibus neque nec libero eleifend pretium. Nam id metus convallis, pretium augue at, aliquam orci. Etiam aliquet posuere nulla id sollicitudin. Praesent non dignissim justo. Phasellus tincidunt lobortis tellus eget porta. Nam auctor gravida mattis. </p>
	</div>

	<div class="standard-monty">
		<p class="space"></p>
		<p class="title"> Standard Monty </p>
    <p class="text"> Vestibulum ut orci vel elit commodo iaculis. Nullam gravida finibus ex id lacinia. Maecenas fermentum eros ut nisi malesuada, in laoreet ipsum vulputate. Cras sed lectus vel ipsum viverra ultrices. Nulla lobortis purus quis tincidunt maximus. Phasellus condimentum eget erat ut feugiat. Duis auctor nibh quis tempus hendrerit. Praesent sit amet ipsum non purus fringilla facilisis in quis purus. Etiam a nunc magna. Duis egestas malesuada lacinia. Nullam tortor erat, ullamcorper vitae purus a, rutrum bibendum ante. Etiam euismod ipsum massa, non mollis arcu facilisis a. Etiam tincidunt risus vitae eleifend volutpat. </p>
	</div>

	<div class="misconceptions">
		<p class="title"> Misconceptions </p>
    <p class="text"> Aenean ut nisi interdum, pretium libero at, blandit enim. Donec pulvinar faucibus ligula, quis varius dui. Duis sed tristique mauris. Mauris augue sapien, feugiat pulvinar feugiat eget, ornare eget metus. Sed mattis fermentum porta. Aliquam sit amet augue eu sapien facilisis efficitur. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean quis luctus ipsum. </p>
	</div>

	<div class="variants">

		<p class="space"></p>
		<p class="title"> Variant Monty's </p>
		<div class="tabs">
			<button class="variantsButton" onclick="openVariants(event, 'hell')">Hell</button>
			<button class="variantsButton" onclick="openVariants(event, 'ignorant')">Ignorant</button>
		</div>

			<div id="hell" class="monty">
				<p class="">Monty From Hell</p>
				<p class="">Maecenas ullamcorper lectus eget mauris gravida interdum. Maecenas tincidunt neque eu iaculis ultricies. Sed elementum libero nec turpis dignissim elementum. Sed tempor dignissim pharetra. Nulla sit amet mi rutrum ante fringilla vehicula. Quisque euismod arcu in dictum vestibulum. Proin tincidunt enim non arcu tempus, non varius eros dignissim.</p>
			</div>
			<div id="ignorant" class="monty">
				<p class="">Ignorant Monty</p>
				<p class="">Duis fermentum nec leo ut aliquam. Integer elementum mattis est, ac sollicitudin ante semper vitae. Sed sit amet cursus nulla. Sed neque orci, aliquet ultrices ipsum in, consequat sodales neque. Suspendisse fringilla augue mauris, sed mattis leo facilisis sed. Phasellus tempor id turpis ac aliquet. Nullam pellentesque suscipit erat, vel tincidunt dolor varius et. Vivamus ornare maximus felis, ut hendrerit ipsum accumsan id. Cras dignissim metus id rutrum suscipit. Nulla facilisi.</p>
			</div>
		<script>
			function openVariants(evt, cityName) {
				var x = document.getElementsByClassName("monty");
				for (var i = 0; i < x.length; i++) {
					x[i].style.display = "none";
				}
				document.getElementById(cityName).style.display = "block";
				var y = document.getElementsByClassName("variantsButton");
				for (var i = 0; i < y.length; i++) {
					y[i].className = y[i].className.replace(" active", "");
				}
				evt.currentTarget.className += " active";
			}
		</script>

	</div>

	<div class="resources">
		<p class="title"> Resources </p>
    <p class="text"> Vestibulum euismod lectus nunc, sit amet ornare augue suscipit sit amet. Integer pulvinar, quam vel ultricies blandit, mi enim luctus libero, vel porta augue augue id orci. Integer tellus nisl, luctus non vulputate eu, imperdiet et justo. Phasellus congue a nisl nec fringilla. Sed tempus leo nec nibh tincidunt, sed congue urna faucibus. Fusce scelerisque congue orci a vestibulum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sed dignissim neque. Praesent eu hendrerit dui, et condimentum diam. Praesent gravida erat vitae mauris pharetra, at viverra tortor cursus. Mauris lobortis nisl ut nibh luctus luctus. Phasellus ultricies mauris enim, a eleifend mauris fermentum ac. Donec leo mauris, dapibus in rutrum eget, fringilla id eros. </p>
	</div>

	<div class="footer">

	</div>
</div>
</html>
