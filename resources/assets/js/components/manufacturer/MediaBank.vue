<template>
    <div>
        <div class="columns">
        	<h2>Mapper</h2>
        </div>
        <div class="columns media--page-padding">
        	<div 
                class="column is-2 is-gapless media--hover"
                v-for="folder in folders"
                @click="select(folder)"
            >
                <div 
                    class="media--map-box"
                    :class="{ 'media--active' : isSelected(folder) }"
                >
	        		<span class="icon is-medium">
					  <i class="fa fa-folder"></i>
					</span>
					<h5>{{folder.name}}</h5>
	        	</div>
        	</div>
        </div>


         <div class="columns">
        	<h2>Filer</h2>
        </div>
        <div class="columns media--page-padding">
        	<div 
                class="column is-2 media--text-align media--hover"
                v-for="file in files"
                :class="{ 'media--active' : isSelected(file) }"
                @click="select(file)"
            >
        		<div class="media--file-image">
        			<img :src="file.image" alt="File Image">
        		</div>
        		<div class="media--file-image-text">
        			<h5>
                    <span class="icon">
                      <i class="fa media--file-icon" :class="file.icon"></i>
                    </span>
                        {{file.name}}
                    </h5>
        		</div>
        	</div>
        </div>



        <!-- højreklik-menu -->

        <div class="rightclickmenu">
        	<ul>
        		<li>
        			<span class="icon">
					  <i class="fa fa-trash"></i>
					</span>
					Menu 1
				</li>
        		<li>
        			<span class="icon">
					  <i class="fa fa-trash"></i>
					</span>
					Menu 2
        		</li>
        		<li>
        			<span class="icon">
					  <i class="fa fa-trash"></i>
					</span>
					Menu 3
        		</li>
        		<li>
        			<span class="icon">
					  <i class="fa fa-trash"></i>
					</span>
					Menu 4
        		</li>
        		<li>
        			<span class="icon">
					  <i class="fa fa-trash"></i>
					</span>
					Menu 5
        		</li>
        		<li><span class="icon">
					  <i class="fa fa-trash"></i>
					</span>
					Menu 6
				</li>
        		<li>
        			<span class="icon">
					  <i class="fa fa-trash"></i>
					</span>
					Menu 7
        		</li>
        	</ul>
        </div>

    </div>
</template>

<script>
    export default {
        props: {
            media: {
                type: Array
            }
        },
        data() {
            return {
                selected_media : []
            }
        },
        methods: {
            select(media){
                if(this.isSelected(media))
                {
                    this.selected_media = this.selected_media.filter((medie) => medie.id != media.id)
                }else{
                    this.selected_media.push(media);
                }
            },
            isSelected(media){
                return !! this.selected_media.find((medie) => medie.id == media.id);
            }
        },
        computed:{
            folders() {
                return this.media.filter( (file) => file.type == 'folder');
            },
            files() {
                let files = this.media.filter( (file) => file.type != 'folder');
                files.forEach(function(file){
                    switch(file.type){
                        case 'pdf':
                            file.image = '/images/icons/pdf.png';
                            file.icon = 'fa-file-pdf-o';
                        break;
                        case 'excel':
                            file.image = '/images/icons/excel.png';
                            file.icon = 'fa-file-excel-o';
                        break;
                        case 'image':
                            file.image = file.path;
                            file.icon = 'fa-picture-o';
                        break;
                        default:
                            file.image = '/images/icons/file.png';
                            file.icon = 'fa-file-o';
                    };
                });
                return files;
            }
        },
        created(){
        },
        mounted() {
            
        }
    }
</script>