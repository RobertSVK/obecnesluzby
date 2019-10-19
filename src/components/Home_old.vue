<template>
<div>

    <!--  <div class="bg0"></div> -->
    <v-layout text-xs-center wrap>
        <v-flex xs12 class="bg99">
            <!--  <v-img :src="require('../assets/g3994.png')" class="my-3" contain height="200"></v-img> -->
            <img :src="require('../assets/g3994.png')" class="my-3 my-logo"  />

            <v-img src="img/smizany.jpg" class="bg88"></v-img>
        </v-flex>
    </v-layout>

    <v-card>
        <v-card-title primary-title dark color="primary" class="title">
            <div class="title display-1">
                OBECNÉ SLUŽBY</div>
        </v-card-title>
        <v-card-text>
            Smižianske služby, s.r.o sú obecnou firmou obce Smižany. Obecná firma bola založená v roku 2019 a bol jej priznaný štatút sociálneho podniku.
        </v-card-text>
    </v-card>
    <div :class="{ bg1: isActive }"></div>
    <v-card id="cinnost">
        <v-card-title primary-title dark color="primary" class="title">
            <div class="title display-1">
                ČINNOSŤ</div>
        </v-card-title>
        <v-card-text>
            <v-list two-line>
                <template v-for="(item, index) in items2">
                    <!--    <v-subheader v-if="item.header" :key="item.header">
                        {{ item.header }}
                    </v-subheader> -->
                    <!-- 
                    <v-divider  :key="index" :inset="item.inset"></v-divider> -->

                    <v-list-tile :key="item.title" avatar @click="">
                        <!--  <v-list-tile-avatar>
                            <img :src="item.avatar">
              </v-list-tile-avatar>
 -->
                        <v-list-tile-content>
                            <v-list-tile-title v-html="item.title"></v-list-tile-title>
                            <v-list-tile-sub-title v-html="item.subtitle"></v-list-tile-sub-title>
                        </v-list-tile-content>
                    </v-list-tile>
                </template>
            </v-list>

        </v-card-text>
    </v-card>
    <div :class="{ bg2: isActive }"></div>
    <v-card>
        <v-card-title primary-title dark color="primary" class="title">
            <div class="title display-1">
                KONTAKT</div>
        </v-card-title>
        <v-card-text>
            Nám. M. Pajdušáka 1341/50<br>
            053 11 Smižany<br>

        </v-card-text>
    </v-card>
    <p class="py-3"></p>
</div>
</template>

<script>
export default {
    data() {
        return {
            isActive: true,
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
        }
    }
}
</script>

<style>
@media only screen and (min-device-width: 768px) and (max-device-width: 1024px) {
    .bg0 {
        background-image: url("/img/smizany.jpg");
        background-repeat: no-repeat;
        background-attachment: initial;
    }

    .bg1 {
        background-image: url("/img/1761481_1200x.jpg");
        background-repeat: no-repeat;
        background-attachment: initial;
        height: 300px;
    }
}

.bg99::after {
    background-image: url("/img/smizany.jpg");

    background-position-x: center;

    background-position-y: center;

    background-size: cover;
}

.bg88 {
    background-image: url("/img/smizany.jpg");

    background-position-x: center;

    background-position-y: center;

    background-size: cover;
    position: absolute !important;

height: 250px;

width: 100%;

top: 0px;

z-index: 0;

opacity: 0.25;
}

.my-logo
{
    
   /*  height: 200px; */
    width: 80%;

max-width: 500px;
}

.title {
    background-color: rgb(52, 83, 229);
    color: white;
}

.bg0 {
    background-image: url("/img/smizany.jpg");
    background-repeat: no-repeat;
    background-attachment: fixed;
}

.bg1 {
    background-image: url("/img/1761481_1200x.jpg");
    background-repeat: no-repeat;
    background-attachment: fixed;
    height: 300px;
    background-size: cover;
    background-position: center;
}

.bg2 {
    background-image: url("/img/i_4586285.jpg");
    background-repeat: no-repeat;
    background-attachment: fixed;
    height: 300px;
    background-size: cover;
    background-position: center;
}
</style>
