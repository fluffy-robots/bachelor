<template>
    <div @click="hideContextMenu">
        <nav class="nav has-shadow page-control">
            <button class="button is-medium is-primary" @click="showUploadDropdown = !showUploadDropdown">Ny</button>
            <transition name="fade">
                <div class="upload-dropdown" v-show="showUploadDropdown">
                    <input type="text" class="input" placeholder="Ny Mappe" v-model="newFolderName">
                    <button class="button is-primary" @click.prevent="createNewFolder" :disabled="newFolderName.length == 0">Ny Mappe</button>
                    <form 
                        action="/file-upload"
                        class="dropzone"
                        id="my-awesome-dropzone"
                    ></form>
                </div>
            </transition>
            <span class="nav-item breadcrumbs">
                <a v-for="breadcrumb in breadcrumbs" @click="goToBreadcrumb(breadcrumb)">{{breadcrumb.name}}</a>
            </span>
        </nav>

        <div class="columns">
        	<h2>Mapper</h2>
        </div>
        <div class="columns media--page-padding">
            <div 
                class="column is-2 is-gapless media--hover animated zoomInRight"
                v-for="folder in folders"
                @click="select(folder)"
                @dblclick="openFolder(folder)"
                @contextmenu.prevent="activateContextMenu(folder)"
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
                class="column is-2 media--text-align media--hover animated zoomInRight"
                v-for="file in files"
                :class="{ 'media--active' : isSelected(file) }"
                @click="select(file)"
                @contextmenu.prevent="activateContextMenu(file)"
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

    <transition name="fade">
        <div class="rightclickmenu" v-show="showContextMenu">
            <ul>
        		<li @click="contextMenuClicked('preview')">
                    <span class="icon">
					  <i class="fa fa-eye"></i>
					</span>
					Preview
				</li>
                <li @click="contextMenuClicked('rename')">
                    <span class="icon">
                      <i class="fa fa-pencil"></i>
                    </span>
                    Omdøb
                </li>
                <li @click="contextMenuClicked('move')">
                    <span class="icon">
                      <i class="fa fa-arrows"></i>
                    </span>
                    Flyt
                </li>
                <li @click="contextMenuClicked('delete')">
                    <span class="icon">
                      <i class="fa fa-trash"></i>
                    </span>
                    Slet
                <li @click="contextMenuClicked('copy')">
                    <span class="icon">
                      <i class="fa fa-files-o"></i>
                    </span>
                    Duplikér
                </li>
                <li @click="contextMenuClicked('download')">
                    <span class="icon">
                      <i class="fa fa-download"></i>
                    </span>
                    Download
                </li>
            </ul>
        </div>
    </transition>   

    </div>
</template>

<script>
    export default {
        props: {
            data: {
                type: Array
            }
        },
        data() {
            return {
                media: this.data,
                selected_media : [],
                showContextMenu : false,
                contextMenuItem : {},
                showUploadDropdown : false,
                newFolderName: '',
                parentId: 0,
                breadcrumbs: [ { id: 0 , name: 'Medie Banken'} ]
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
            },
            activateContextMenu(item){
                this.contextMenuItem = item;
                this.showContextMenu = true;
                document.querySelector('.rightclickmenu').style.left = window.event.clientX + 'px';
                document.querySelector('.rightclickmenu').style.top = window.event.clientY + 'px';
            },
            hideContextMenu(){
                this.showContextMenu = false;
            },
            contextMenuClicked(action){
                console.log('clicked', action, this.contextMenuItem.name);
            },
            createNewFolder(){
                this.$http.post('/api/v1/files', { name: this.newFolderName, parent_id: this.parentId, type: 'folder', api_token: Laravel.api_token }).then((response) => {
                    Toastr.success('Mappen '+this.newFolderName+' Oprettet');
                    this.showUploadDropdown = false;
                    this.newFolderName = '';
                    this.refreshMedia(this.parentId);
                }, (response) => {
                    Toastr.error('Mappen blev ikke oprettet');
                    this.showUploadDropdown = false;
                });
            },
            openFolder(folder){
                this.parentId = folder.id;
                this.refreshMedia(folder.id);
                let breadcrumb = {
                    id : folder.id,
                    name: folder.name
                }
                this.breadcrumbs.push(breadcrumb);
            },
            goToBreadcrumb(breadcrumb){
                let index = this.breadcrumbs.findIndex((item) => item.id == breadcrumb.id);
                this.breadcrumbs.splice(index + 1, this.breadcrumbs.length - 1);
                this.refreshMedia(breadcrumb.id);
            },
            refreshMedia(parentId = this.parentId){
                this.$http.get('/manufacturer/files?parent_id='+parentId).then((response) => {
                    this.selected_media = [];
                    this.media = (Array.isArray(response.body)) ? response.body : [response.body];
                });
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
        mounted() {
        }
    }
</script>