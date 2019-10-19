<template>
<v-app>
  <v-toolbar app scroll-off-screen fixed>
      <v-avatar
          tile
         
          color="grey lighten-4"
        ><v-img :src="require('./assets/g4018.png')" contain></v-img>
      </v-avatar>
      <v-toolbar-title class="text-md-center" style="width: 100%;"> 
          OBECNÁ FIRMA</v-toolbar-title>
      <v-spacer></v-spacer>
      <v-img :src="require('./assets/i_5285834.jpg')" style="width: 40px;"></v-img>
      <!-- <v-toolbar-items class="hidden-sm-and-down">
         <v-btn
          v-for="item in menu"
          :key="item.icon"
          :to="item.link"
          flat
        >{{ item.title }}</v-btn>
      </v-toolbar-items> -->
      <v-menu class="hidden-md-and-up">
        <v-toolbar-side-icon slot="activator"></v-toolbar-side-icon>
        <v-list>
          <v-list-tile v-for="item in menu" :key="item.icon" @click="" :to="item.link">
            <v-list-tile-content>
              <v-list-tile-title>{{ item.title }}</v-list-tile-title>
             </v-list-tile-content>
          </v-list-tile>   
        </v-list>
      </v-menu>
    </v-toolbar>







   <!--  <v-toolbar app scroll-off-screen>

        <v-menu bottom left>
            <template v-slot:activator="{ on }">
                <v-toolbar-side-icon class="hidden-md-and-up" @click="hamburger = !hamburger" v-on="on"></v-toolbar-side-icon>
               
            </template>

            <v-list>
                <v-list-tile v-for="(item, i) in items" :key="i" @click="">
                    <v-list-tile-title>{{ item.title }}</v-list-tile-title>
                </v-list-tile>
            </v-list>
        </v-menu>

        <v-toolbar-title class="headline">
            <span>SMIŽIANSKE SLUŽBY</span>
            <span class="font-weight-light"></span>
        </v-toolbar-title>
        <v-spacer></v-spacer>
        <v-toolbar-items class="hidden-sm-and-down">
            <v-btn flat to="/">Úvod</v-btn>
            <v-btn flat to="/dokumenty">Dokumenty</v-btn>
            <v-btn flat>Kontakt</v-btn>
        </v-toolbar-items>

    </v-toolbar> -->
 
    <v-content>

        <router-view></router-view>
    </v-content>

    <v-footer class="pa-3" fixed>
        Smižianske služby s.r.o.
    <v-spacer></v-spacer>
    <div>&copy; {{ new Date().getFullYear() }}</div>
  </v-footer>
</v-app>
</template>

<script>
export default {
    name: 'App',
    components: {

    },
    data() {
        return {
            //
            hamburger: false,
            menu: [{
                    icon: 'home',
                    title: 'Úvod',
                    link: "/"
                },
                {
                    icon: 'activity',
                    title: 'Činnosť',
                    link: "/#cinnost"
                },
                {
                    icon: 'warning',
                    title: 'Dokumenty',
                    link: "/dokumenty"
                },
                 {
                    icon: 'contact',
                    title: 'Kontakt',
                    link: "/kontakt"
                }
            ],
            items: [{
                    title: 'Úvod'
                },
                {
                    title: 'Dokumenty'
                },
                {
                    title: 'Kontakt'
                },

            ]
        }
    }
}
</script>
