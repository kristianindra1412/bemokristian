<template>
	<div class='card'>
		<div class='card__title'>{{ title }}</div>
		<div class='card__desc'>{{ desc }}</div>
		<div class='card__control'>
			<div class='card__control-item' @click='move(1)'> < </div>
			<div class='card__control-item' @click='move(2)'> ^ </div>
			<div class='card__control-item' @click='move(3)'> v </div>
			<div class='card__control-item' @click='move(4)'> > </div>
		</div>
	</div>
</template>

<script>
    export default {
		props: ['id','pos','title','desc'],
		methods: {
			async move(x) {
				switch(x) {
					case 1 : {
						x = 'left';
						//x = this.pos;
						const { data } = window.axios.get('/api/card/fetch');
						console.log('1' + data);
						break; }
					case 2 : {
						x = 'top';
						break; }
					case 3 : {
						x = 'bot';
						break; }
					case 4 : {
						x = 'right';
						break; }
				}
				alert(x);
			},
			remove() {},
			addCard() {},
		},
        mounted() {
            console.log('Card Component mounted.')
        }
    }
</script>
