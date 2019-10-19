<template>
<div>
    <v-img :src="require('../assets/smizany1194x489.jpg')" style="max-height: 350px;"></v-img>

    <v-layout row wrap class="pa-3">
        <v-flex sm3 class="pa-2" v-for="item in menu" :key="item.title">
            <v-card>
                <h2 class="primary pa-2 text-uppercase">{{item.title}}</h2>

                <v-btn class="mx-1 px-1 my-0 py-0" flat v-for="btn in item.submenu" :key="btn.title">{{btn.title}}</v-btn>
            </v-card>
        </v-flex>
    </v-layout>

    <v-card class="ma-4 mb-5">
        <h2 class="primary pa-2 text-uppercase">AKTUALITY</h2>
        <v-layout row wrap class="pa-3">
            <v-flex sm4 class="pa-2" v-for="item in visibleNews" :key="item.title">
                <v-card>
                    <v-card-title>{{item.title}}</v-card-title>
                </v-card>
            </v-flex>
        </v-layout>
        <v-layout row wrap class="pa-3">
            <v-flex sm4 class="pa-2">
                <v-pagination v-model="pagination.page" :length="Math.ceil(pagination.total / pagination.perPage)" :total-visible="pagination.visible" @input="updatePage"></v-pagination>
            </v-flex>
        </v-layout>
    </v-card>

    <v-card></v-card>
</div>
</template>

<script>
//return this.pagination.rowsPerPage ? Math.ceil(this.items.length / this.pagination.rowsPerPage) : 0
export default {
    mounted: function () {
        this.visibleNews = this.news.slice(0, 3);
    },
    methods: {
        updatePage(page) {
            console.log(page);
            page -= 1;
            var p = this.pagination;
            console.log(p);
            this.visibleNews = this.news.slice(
                page * p.perPage,
                page * p.perPage + p.perPage
            );
        }
    },
    data() {
        return {
            isActive: true,
            pagination: {
                page: 1,
                total: 18,
                perPage: 3,
                visible: 5,
                length: 0
            },
            visibleNews: [],
            news: [{
                    title: "Klzisko"
                },
                {
                    title: "Tribuna"
                },
                {
                    title: "Akcia 2"
                },
                {
                    title: "Akcia 3"
                },
                {
                    title: "Akcia 4"
                },
                {
                    title: "Akcia 5"
                },
                {
                    title: "Akcia 6"
                },
                {
                    title: "Akcia 7"
                },
                {
                    title: "Akcia 8"
                },
                {
                    title: "Akcia 9"
                }
            ],
            menu: [{
                    title: "O firme",
                    submenu: [{
                            title: "o firme 1"
                        },
                        {
                            title: "o firme 2"
                        },
                        {
                            title: "o firme 3"
                        },
                        {
                            title: "o firme 4"
                        },
                        {
                            title: "o firme 5"
                        },
                        {
                            title: "o firme 6"
                        },
                        {
                            title: "o firme 7"
                        }
                    ]
                },
                {
                    title: "Zverejňovanie",
                    submenu: [{
                            title: "Cenník služieb"
                        },
                        {
                            title: "Dokumenty"
                        },
                        {
                            title: "Zverejňovanie 1"
                        },
                        {
                            title: "Zverejňovanie 2"
                        },
                        {
                            title: "Zverejňovanie 3"
                        },
                        {
                            title: "Zverejňovanie 4"
                        },
                        {
                            title: "Zverejňovanie 5"
                        }
                    ]
                },
                {
                    title: "Otázky a tlačivá",
                    submenu: [{
                            title: "Otázky 1"
                        },
                        {
                            title: "Otázky 2"
                        },
                        {
                            title: "tlačivá 1"
                        },
                        {
                            title: "tlačivá 2"
                        },
                        {
                            title: "tlačivá 3"
                        },
                        {
                            title: "tlačivá 4"
                        },
                        {
                            title: "tlačivá 5"
                        }
                    ]
                },
                {
                    title: "Kontakty",
                    submenu: [{
                            title: "Kontakt 1"
                        },
                        {
                            title: "Kontakt 2"
                        },
                        {
                            title: "Kontakt 1"
                        },
                        {
                            title: "Kontakt 2"
                        },
                        {
                            title: "Kontakt 3"
                        },
                        {
                            title: "Kontakt 4"
                        },
                        {
                            title: "Kontakt 5"
                        }
                    ]
                }
            ],
            items2: [{
                    title: "Prípravné a stavebné práce pre stavbu, demolácie, búracie práce"
                },
                {
                    title: "Zemné práce – pretlaky na plyn, vodu"
                },
                {
                    title: "Kosenie pozemkov"
                },
                {
                    title: "Štiepkovanie dreva"
                },
                {
                    title: "Poskytovanie služieb s mechanizmami"
                },
                {
                    title: "Oprava výtlkov cestnej komunikácie"
                },
                {
                    title: "Výroba z dreva – výroba úľov, drvených predmetov, hlavolamov a pod."
                },
                {
                    title: "Výroba a predaj peletiek"
                },
                {
                    title: "Zatepľovanie budov"
                },
                {
                    title: "Práca s kameňom"
                },
                {
                    title: "Brúsenie pílových kotúčov"
                }
            ]
        };
    }
};
</script>

<style >
</style>
