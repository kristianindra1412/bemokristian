<template>
	<div class='column'>
		<div class='column__title'>{{ title }}</div>
		<div class='column__container-card'>
			<card 
				v-for='item in cardlist'
				v-bind:key='item.id'
				v-bind:title='item.title'
				v-bind:desc='item.desc'
			/>
		</div>
	</div>
</template>

<script>
	import card from './Card.vue'
    export default {
		props: ['title'],
		data() {
			return {
				cardlist: [
					{id:1,pos:1,title:'SATU',desc:'ONE'},
					{id:2,pos:2,title:'DUA',desc:'TWO'},
					{id:3,pos:3,title:'TIGA',desc:'THREE'},
				]
			}
		},
		components: {
			card
		},
		methods: {
			async read() {
				const { data } = window.axios.get('/api/column/fetch');
				console.log(data)
			},		
			move() {},
			remove() {},
			addCard() {},
		},
		created() {
			this.read();
		},			
        mounted() {
            console.log('Column Component mounted.')
        }
    }
</script>
