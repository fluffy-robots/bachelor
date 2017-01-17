<template>
    <div style="background: white;" @click="hideContextMenu">
        <nav class="nav has-shadow page-control">
            <div class="nav-left">
                <button class="button is-medium is-primary" @click="showUploadDropdown = !showUploadDropdown">
                    Ny 
                    <span class="icon" style="padding-left: 10px;">
                        <i class="fa" :class="{ 'fa-caret-up' : showUploadDropdown, 'fa-caret-down' : !showUploadDropdown }"></i>
                    </span>
                </button>
                <transition name="fade">
                    <div class="upload-dropdown" v-show="showUploadDropdown">
                        <input type="text" class="input" placeholder="Ny Mappe" v-model="newFolderName">
                        <button class="button is-primary" @click.prevent="createNewFolder" :disabled="newFolderName.length == 0">Opret Mappe</button>
                        <form 
                            action="/manufacturer/files"
                            class="dropzone"
                            id="manufacturer-dropzone"
                        ></form>
                    </div>
                </transition>
                <span class="nav-item breadcrumbs">
                    <a v-for="breadcrumb in breadcrumbs" @click="goToBreadcrumb(breadcrumb)">{{breadcrumb.name}}</a>
                </span>
            </div>
            <div class="nav-center">
            </div>
            <div class="nav-right">
                <span class="media-controls separator" v-show="selected_media.length > 0">
                    <!-- <a class="button is-primary is-inverted">
                        <span class="icon">
                            <i style="color: black;" class="fa fa-eye"></i>
                        </span>
                    </a>
                    <a class="button is-primary is-inverted">
                        <span class="icon">
                            <i style="color: black;" class="fa fa-pencil"></i>
                        </span>
                    </a>
                    <a class="button is-primary is-inverted">
                        <span class="icon">
                            <i style="color: black;" class="fa fa-arrows"></i>
                        </span>
                    </a> -->
                    <a class="button is-primary is-inverted">
                        <span class="icon" @click="deleteFiles">
                            <i style="color: black;" class="fa fa-trash"></i>
                        </span>
                    </a>
                    <!-- <a class="button is-primary is-inverted">
                        <span class="icon">
                            <i style="color: black;" class="fa fa-files-o"></i>
                        </span>
                    </a>
                    <a class="button is-primary is-inverted">
                        <span class="icon">
                            <i style="color: black;" class="fa fa-download"></i>
                        </span>
                    </a> -->
                </span>
                <!-- <a class="button is-primary is-medium is-inverted">
                    <span class="icon">
                        <i class="fa fa-list"></i>
                    </span>
                </a>
                <a class="button is-primary is-medium is-inverted">
                    <span class="icon">
                        <i class="fa fa-th-large"></i>
                    </span>
                </a> -->
            </div>
        </nav>

        

        <div class="media-grid">
            <h2>Mapper</h2>
            <div 
                class="media-folder"
                v-for="folder in folders"
                @click="select(folder)"
                @dblclick="openFolder(folder)"
                :class="{ 'media--active' : isSelected(folder) }"
                @contextmenu.prevent="activateContextMenu(folder)"
            >
                <div class="media-content">
                    <span class="icon is-medium">
                      <i class="fa fa-folder"></i>
                    </span>
                    <div class="media-title">
                        {{folder.name}}
                    </div>
                </div>
            </div>

            <h2>Filer</h2>
            <div 
                class="media-file"
                v-for="file in files"
                :class="{ 'media--active' : isSelected(file) }"
                @click="select(file)"
                @contextmenu.prevent="activateContextMenu(file)"
            >
                <div class="media-file--image">
                    <img :src="file.image" alt="File Image">
                </div>
                <div class="media-content">
                    <span class="icon is-medium">
                      <i class="fa" :class="file.icon"></i>
                    </span>
                    <div class="media-title">
                        {{file.name}}
                    </div>
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
        data() {
            return {
                media: [],
                selected_media : [],
                showContextMenu : false,
                contextMenuItem : {},
                showUploadDropdown : false,
                newFolderName: '',
                parentId: 0,
                breadcrumbs: [ { id: 0 , name: 'Medie Banken'} ],
                dropzone: null
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
            deleteFiles(){
                if(this.selected_media.length > 0)
                {
                    this.selected_media.forEach( (media) => {
                        this.$http.delete('/manufacturer/files/'+media.id).then((response) => {
                            console.log(response);
                        });
                    });
                    this.refreshMedia(this.parentId);
                }
            },
            contextMenuClicked(action){
                console.log('clicked', action, this.contextMenuItem.name);
                switch(action){
                    case 'preview':
                    break;
                    case 'rename':
                    break;
                    case 'move':
                    break;
                    case 'delete':
                        this.$http.delete('/manufacturer/files/'+this.contextMenuItem.id).then((response) => {
                            console.log(response);
                            this.refreshMedia(this.parentId);
                        });
                    break;
                    case 'copy':
                    break;
                    case 'download':
                    break;
                    default:
                    console.log('nothing happened, Missing Action');
                }
            },
            createNewFolder(){
                this.$http.post('/manufacturer/folders', { name: this.newFolderName, parent_id: this.parentId }).then((response) => {
                    Toastr.success('Mappen '+this.newFolderName+' blev oprettet');
                    this.showUploadDropdown = false;
                    this.newFolderName = '';
                    this.refreshMedia(this.parentId);
                }, (response) => {
                    Toastr.error('Mappen blev ikke oprettet');
                    this.showUploadDropdown = false;
                });
            },
            openFolder(folder){
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
                this.parentId = parentId;
                this.$http.get('/manufacturer/files?parent_id='+parentId).then((response) => {
                    this.selected_media = [];
                    this.media = response.data;
                });
            }
        },
        computed:{
            folders() {
                if(this.media.length == 0)
                {
                    return [];
                }
                return this.media.filter( (file) => file.type == 'folder');
            },
            files() {
                if(this.media.length == 0)
                {
                    return [];
                }
                let files = this.media.filter( (file) => file.type != 'folder');
                files.forEach((file) => {
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
            let vm = this;
            vm.refreshMedia(0);
            let manufacturerDropzone = new Dropzone("form#manufacturer-dropzone", { url: "/manufacturer/files" });
            manufacturerDropzone
                .on("sending", function(file, xhr, formData) {
                    formData.append("_token", Laravel.csrfToken);
                    formData.append('parent_id', vm.parentId);
                })
                .on('complete', function (file) {
                    if (this.getUploadingFiles().length === 0 && this.getQueuedFiles().length === 0)
                    {
                        vm.dropzone = this;
                        this.removeAllFiles();
                        vm.refreshMedia(vm.parentId);
                        vm.showUploadDropdown = false;
                    }
                });
        }
    }
</script>