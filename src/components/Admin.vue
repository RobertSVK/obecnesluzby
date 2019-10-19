<template>
<div>
    <v-form v-model="valid">
        <v-container>
            
            <v-layout row wrap>
                <v-flex xs12 md4>
                    <v-text-field v-model="cislo" :rules="nameRules" :counter="10" label="Číslo" required></v-text-field>
                </v-flex>
                <v-flex xs12 md6>
                    <v-text-field v-model="partner" :rules="nameRules" :counter="300" label="Partner" required></v-text-field>
                </v-flex>
                <v-flex xs12 md2>
                     <v-text-field v-model="ico" :rules="nameRules" :counter="8" label="IČO" required></v-text-field>
                </v-flex>
                <v-flex xs12 md2>
                    <v-select v-model="typ" :items="typy" label="Typ"></v-select>
                </v-flex>
                <v-flex xs12 md2>
                     <v-text-field v-model="cena" :rules="nameRules"  label="Cena" required></v-text-field>
                </v-flex>
            </v-layout>
            <v-layout row wrap>
                <v-flex xs12>
                    <label>Dokument: 
                <input class="v-btn" type="file" id="file" ref="file" v-on:change="handleFileUpload()"/>
            <!--   <v-input type="file" id="file" ref="file" v-on:change="handleFileUpload()">AAA</v-input> -->
            </label>
                    <v-btn 
                    :loading="loading"
                    :disabled="loading"
                    color="info" v-on:click="submitFile()">Poslať<v-icon right dark>cloud_upload</v-icon></v-btn>
                </v-flex>
            </v-layout>
        </v-container>
    </v-form>
    
    <v-alert
      :value="uploadError"
      type="error"
      dismissible
    >
      ERROR: {{uploadErrorMessage}}
    </v-alert>
    <v-alert
      :value="uploadOk"
      type="success"
      dismissible
    >
      Dokument <i>"{{uploadFile}}"</i> bol uložený.
    </v-alert>
</div>
</template>

<script>
export default {
    components: {

    },
    data() {
        return {
            selectedFile: null,
            loading: false,
            uploadOk: false,
            uploadError: false,
            uploadFile: null,
            uploadErrorMessage: "",
            images: [],
            file: null,
            files: [],
            typy: ["zmluva","objednávka","faktúra"],
            cislo: null,
            partner: null,
            typ: null,
            ico: null,
            cena: null,
            nameRules: [true],
            valid: true,
        };
    },
    methods: {
        formReset(){
            this.file = null
            this.cislo = null
            this.partner = null
            this.typ = null
            this.ico = null
            this.cena = null 
            this.loading = false
           
        },
        handleFileUpload() {
            console.log(this.$refs.file.files[0])
            this.file = this.$refs.file.files[0];
        },
        submitFile() {
            console.log("submitFile")
            let formData = new FormData();
            formData.append('file', this.file);
            formData.append('cislo', this.cislo);
            formData.append('partner', this.partner);
            formData.append('typ', this.typ);
            formData.append('ico', this.ico);
            formData.append('cena', this.cena);
            this.uploadOk = false,
            this.uploadError = false
            this.loading = true
            this.axios.post('https://obecnesluzby.sk/up.php',
                    formData, {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    }
                ).then(response => {
                    console.log('SUCCESS !!', response);
                    this.loading = false
                    this.uploadFile = this.file.name
                    this.uploadOk = true
                    this.formReset()
                })
                .catch(error => {
                    console.log('FAILURE !!', error );
                    this.uploadError = true
                    this.uploadErrorMessage = error.message
                });
        },

        uploadImageSuccess(formData, index, fileList) {
            console.log("data", formData, index, fileList);
            window.f = formData
            // Upload image api
            this.axios.post("up.php", {
                data: formData
            }).then(response => {
                console.log(response);
            });
        },
        beforeRemove(index, done, fileList) {
            console.log("index", index, fileList);
            var r = confirm("remove image");
            if (r == true) {
                done();
            } else {
                console.log("else")
            }
        },

        onFileChanged(event) {
            this.selectedFile = event.target.files[0];
        },
        onUpload() {
            console.log(this.selectedFile);
            //this.axios.post('/', this.selectedFile)
            const formData = new FormData();
            formData.append("myFile", this.selectedFile, this.selectedFile.name);
            this.axios.post("my-domain.com/file-upload", formData, {
                onUploadProgress: progressEvent => {
                    console.log(progressEvent.loaded / progressEvent.total);
                }
            });
        }

    },

};
</script>

<style>
#my-strictly-unique-vue-upload-multiple-image {
    font-family: 'Avenir', Helvetica, Arial, sans-serif;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    text-align: center;
    color: #2c3e50;
    margin-top: 60px;
}

h1,
h2 {
    font-weight: normal;
}

ul {
    list-style-type: none;
    padding: 0;
}

li {
    display: inline-block;
    margin: 0 10px;
}

a {
    color: #42b983;
}

.example-full .btn-group .dropdown-menu {
    display: block;
    visibility: hidden;
    transition: all .2s
}

.example-full .btn-group:hover>.dropdown-menu {
    visibility: visible;
}

.example-full label.dropdown-item {
    margin-bottom: 0;
}

.example-full .btn-group .dropdown-toggle {
    margin-right: .6rem
}

.example-full .filename {
    margin-bottom: .3rem
}

.example-full .btn-is-option {
    margin-top: 0.25rem;
}

.example-full .example-foorer {
    padding: .5rem 0;
    border-top: 1px solid #e9ecef;
    border-bottom: 1px solid #e9ecef;
}

.example-full .edit-image img {
    max-width: 100%;
}

.example-full .edit-image-tool {
    margin-top: .6rem;
}

.example-full .edit-image-tool .btn-group {
    margin-right: .6rem;
}

.example-full .footer-status {
    padding-top: .4rem;
}

.example-full .drop-active {
    top: 0;
    bottom: 0;
    right: 0;
    left: 0;
    position: fixed;
    z-index: 9999;
    opacity: .6;
    text-align: center;
    background: #000;
}

.example-full .drop-active h3 {
    margin: -.5em 0 0;
    position: absolute;
    top: 50%;
    left: 0;
    right: 0;
    -webkit-transform: translateY(-50%);
    -ms-transform: translateY(-50%);
    transform: translateY(-50%);
    font-size: 40px;
    color: #fff;
    padding: 0;
}
</style>
