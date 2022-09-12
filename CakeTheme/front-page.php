<?php get_header(); ?>

	<div class="head" style="position: fixed; top:0px; width: 100%;background-color: white;">
        <div class="logo">CAKE CHOW</div>
        <div class="nav">
            <a style="text-decoration: none; font-size: 18px" href="/" class="home c-vert">Home</a>
            <a style="text-decoration: none; font-size: 18px" href="/create/cake" class="create">Create</a>
        </div>
    </div>

    <style>
        body, *{
            font-family: 'Barlow Condensed', sans-serif;
        }
        .cakeitem{
            width: 80%;
            max-width: 500px;
            border-radius: 5px;
            box-shadow: 0px 2px 3px grey;
            padding: 10px;
            position: relative;
            margin: 20px auto;
        }
        .cakeitem .maker{
            padding: 10px;
        }
        .cakeitem .bio .cakehead{
            font-size: 25px;
            padding: 10px;
            margin-bottom: 20px;
            font-weight: bold;
        }
        .cakeitem .price{
            border-radius: 10px;
            top: 15px;
            right: 15px;
            padding: 10px;
            background-color: rgb(36, 32, 32);
            color: white;
            font-weight: bold;
            position: absolute;
        }
        .cakeitem .recipe{
            padding: 10px;
            font-size: 18px;
        }
        .cakeitem .cakeoption{
            padding: 10px;
            display:flex;
            justify-content: space-between;
        }
        .cakeitem .cakeoption :nth-child(n){
            padding:10px;
            width: 24%;
            text-align: center;
            font-weight: bold;
            border-radius: 5px;
            color: white;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .cakeitem .cakeoption :nth-child(n):hover{
            box-shadow: 0px 1px 8px -1px grey;
        }

                .c-vert{
                    display: flex;
                    justify-content: center;
                    flex-direction:column;
                }
                .authpack .head{
                    padding: 25px 10px;
                    font-weight: bold;
                    font-size: 25px;
                    border-bottom: 2px solid grey;
                }
                .authpack *{
                    box-sizing: border-box;
                }
                .authpack{
                    margin: 10px auto;
                    margin-top: 45px;
                    width: 80%;
                    max-width: 500px;
                }
                .authpack input{
                    outline: none;
                    padding: 10px;
                    border-radius: 5px;
                    width: 100%;
                    transition: all 0.3s ease;
                }

                .authpack .confirm{
                    border-radius: 10px;
                    padding: 10px;
                    background-color: green;
                    text-align: center;
                    min-height: 50px;
                    min-width: max-content;
                    color: white;
                    font-weight: bold;
                    transition: all 0.3s ease;
                }
                .authpack .confirm:hover{
                    background-color: rgb(5, 41, 5);
                }
    </style>
	    
    <div id="app">
        <div class="authpack" id='search'>
            <h3 class="authtype">Search for your fav cake</h3>
            <div style="display: flex; justify-content: space-between; margin: 10px 0px;">
                <input  style="width: 78%; font-size: 18px" type="text" placeholder="Enter to search">
                <div style="width: 20%" type='api' class="c-vert confirm" v-on:click="searcher()">Search</div>
            </div>
        </div>
        <div v-for="entry in data">
            <div class="cakeitem">

                <div class="bio">
                    <span class="cakehead">{{entry['type']}}/{{entry['name']}}</span>
                    <span class="price">${{entry['price']}}</span>
                </div>
                <div class="maker">Made By: Alice White</div>

                <div class="recipe">{{entry['recipe']}}</div>

                <div class="cakeoption">
                    <div style="background-color: blue" class="edit">Edit</div>
                    <div style="background-color: red" class="delete">Delete</div>
                    <div style="background-color: #71713a" class="View">View</div>
                    <div style="background-color: green" class="buy" v-on:click="buy(entry['id'])">Buy</div>
                </div>

            </div>

        </div>
    </div>
    <script src="https://unpkg.com/vue@3.0.5"></script>
    
    <script>
        const app = Vue.createApp({
            mounted(){
                this.initiate()
            },
            data(){
                return {
                    data:{}
                }
            },
            methods:{
                initiate(){
                    new Cakemanager().findAllCake((response)=>{
                        this.data = response['data'];
                    })
                },
                view(id){
                    window.location.href = location.origin+'/view/cake/' + id;
                },
                buy(){
                    alert('Item successfully added to your cart :)');
                },
                deleter(id){
                    new Cakemanager().deleteCake(id, (response)=>{
                        window.location.href = location.origin;
                    })
                },
                searcher(){
                    $("#search div div").text('Searching');
                    new Cakemanager().searchCake({
                        'key':'name',
                        'search':$("#search input").val()
                    }, (response)=>{
                        $("#search div div").text('Search');
                        if (typeof(response['data']['error']) === 'undefined'){
                            this.data = response['data'];
                        }else{
                            alert('No match found');
                        }
                        
                    })
                },
                edit(id){
                    window.location.href = location.origin+'/edit/cake/' + id;
                }

            }
        })
        app.mount('#app');
    </script>

<?php get_footer();?>