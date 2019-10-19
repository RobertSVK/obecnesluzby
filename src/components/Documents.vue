<template>
<div>
    <v-container>
        <v-card>
            <v-card-title>
                <div class="subheading">Zverejňované dokumenty</div>

                <v-spacer></v-spacer>
                <v-text-field v-model="search" append-icon="search" label="Hľadať" single-line></v-text-field>
            </v-card-title>
        </v-card>

        <v-data-table :loading="loading" :headers="headers" :pagination.sync="pagination" 
        :items="dokumenty" class="elevation-1" :search="search" rows-per-page-text="Počet riadkov na strane">
            <template v-slot:items="props">
                <td class="text-xs-right w-4">{{ props.item.cislo }}</td>
                <td class="w-4">{{ props.item.typ }}</td>
                <td class="">{{ props.item.partner }}</td>
                <td class="w-4">{{ props.item.ico }}</td>
                <td class="text-xs-right w-4">{{ Number(props.item.cena).toFixed(2) }} &euro;</td>
                <td class="text-xs-right w-4">{{ skDate(props.item.datum) }}</td>
                <td class="">
                    <a :href="'uploads/'+props.item.subor" target="_blank" rel="">
                    <v-icon>info</v-icon> </a></td>
            </template>
        </v-data-table>

    </v-container>
</div>
</template>

<script>
export default {
    created() {
        this.getData()
    },
    methods: {
        skDate(isoDate) {
            //2019-07-01 11:20:39 -> 01.07.2019
            return isoDate.substr(8, 2) + "." + isoDate.substr(5, 2) + "." + isoDate.substr(0, 4)
        },
        getData() {
            this.loading = true
            this.axios
                .get("https://obecnesluzby.sk/get.php")
                .then(response => {
                        console.log(response.data)
                        this.loading = false
                        this.dokumenty = response.data
                    }

                )
        }
    },
    data() {
        return {
            search: "",
            loading: false,
            pagination: {rowsPerPage: 10},
            dokumenty: [],
            headers: [{
                    text: 'Číslo',
                    align: 'right',
                    sortable: true,
                    value: 'cislo',
                    class: "t-header primary w-4",
                    width: "10%"
                },
                {
                    text: 'Typ',
                    value: 'typ',
                    class: "t-header primary w-4",
                    width: "10%"
                },
                {
                    text: 'Partner',
                    value: 'partner',
                    class: "t-header primary",
                    width: "40%"
                },
                {
                    text: 'IČO',
                    value: 'ico',
                    class: "t-header primary w-4",
                    width: "10%"
                },
                {
                    text: 'Cena',
                    align: "right",
                    value: 'cena',
                    class: "t-header primary w-4",
                    width: "15%"
                },
                {
                    text: "Dátum",
                    value: "datum",
                    align: "right",
                    class: "t-header primary w-4",
                    width: "10%"
                },
                {
                    text: "Info",
                    value: "",
                    class: "t-header primary w-1",
                    width: "5%"
                }

            ],
        }
    }
}
</script>

<style>
.t-header {
    font-size: 120% !important;
    font-weight: 700 !important;
    color: white !important;
}

table.v-table tbody td:first-child,
table.v-table tbody td:not(:first-child),
table.v-table tbody th:first-child,
table.v-table tbody th:not(:first-child),
table.v-table thead td:first-child,
table.v-table thead td:not(:first-child),
table.v-table thead th:first-child,
table.v-table thead th:not(:first-child) {
    padding: 0 12px !important;
}

.w-4 {
   /*  max-width: 4em;
    min-width: 4em; */
}

.w-1 {
   /*  max-width: 1em;
    min-width: 1em; */
}
</style>
