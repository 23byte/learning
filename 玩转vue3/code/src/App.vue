<template>
  <div id="nav">
    <router-link to="/">Home</router-link> |
    <router-link to="/about">About</router-link>|
    <router-link to="/todoList">TodoList</router-link>|
    <router-link to="/markRaw">markRaw</router-link>|
    <router-link to="/parent">parent</router-link>|
    <router-link to="/parent_v1">parent_v1</router-link>|
    <router-link to="/drag">Drag</router-link>|
    <router-link to="/DynamicArguments">DynamicArguments</router-link>|
    <router-link to="/globalApi">globalApi</router-link>|
    <router-link to="/transition">transition</router-link>|
    <router-link to="/tele">tele</router-link>|
    <router-link to="/async">async</router-link>|
    <router-link to="/toast">toast</router-link>|
  </div>
  <router-view/>
</template>

<style lang="scss">
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}

#nav {
  padding: 30px;

  a {
    font-weight: bold;
    color: #2c3e50;

    &.router-link-exact-active {
      color: #42b983;
    }
  }
}
</style>
