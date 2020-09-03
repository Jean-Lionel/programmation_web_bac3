</div>
	</div>



	<script>
	let navigation = document.querySelector('.navigation')
	let toggle = document.querySelector('.toggle')
	let section = document.querySelector('.section')
	let isActive;

	function toggleMenu(){
		
		navigation.classList.toggle('active')
		isActive = toggle.classList.toggle('active')

		if(isActive){
			section.style.paddingLeft  = '300px'
			
		}else{
			section.style.paddingLeft  = '80px'
		}


	}

	navigation.addEventListener('mouseover',()=>{
		if(!isActive)
			section.style.paddingLeft  = '300px'
	})

	navigation.addEventListener('mouseout',()=>{
		if(!isActive)
			section.style.paddingLeft  = '80px'
	})

	


	</script>


	
</body>
</html>