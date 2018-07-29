<template>
    <div id="add-post-modal" class="noScroll" style="display:none"  >
        <div class="border-bottom mb-2 pb-2 mt-1">
            <h2 class="d-inline">Add post</h2>
            <b-button-close  @click="closeAddPost()"></b-button-close>
        </div>
        <form style="height:85%;">
          <div class="form-group">
                <label for="postCategory">Post Category</label>
                <input type="text" class="form-control" v-model="postCategory" value=""  name="title" id="postCategory" aria-describedby="postTitleHelp" placeholder="Enter title">
            </div>

            <div class="form-group">
                <label for="postTitle">Post Title</label>
                <input type="text" class="form-control" v-model="postTitle" value=""  name="title" id="postTitle" aria-describedby="postTitleHelp" placeholder="Enter title">
            </div>
            
            <div id="add-textarea" ></div>
              <button type="button" @click="storePost()" class="btn btn-primary">Add post</button>
        </form>

    </div>
</template>

<script>
require("codemirror/lib/codemirror.css"); // codemirror
require("tui-editor/dist/tui-editor.css"); // editor ui
require("tui-editor/dist/tui-editor-contents.css"); // editor content
require("highlight.js/styles/github-gist.css"); // code block highlight
require("highlight.js");
import { storePost as apiStorePost } from "../store/api.js";

export default {
  mounted: function() {
    let Editor = require("tui-editor");
    this.editor = new Editor({
      el: document.querySelector("#add-textarea"),
      initialEditType: "markdown",
      previewStyle: "vertical",
      height: "70%"
    });
  },
  data: function() {
    return {
      postTitle: "",
      postCategory: ""
    };
  },
  methods: {
    closeAddPost: function() {
      this.$emit("toggle-add");
    },
    storePost: function() {
      apiStorePost({
        title: this.postTitle,
        body: this.body,
        category: this.postCategory
      }).then(resonse => {
        window.location.href = window.location.href;
      });
    }
  },
  computed: {
    body: function() {
      return this.editor.getMarkdown();
    }
  }
};
</script>

<style>
#add-post-modal {
  height: 100vh;
  width: 100vw;
  position: fixed;
  top: 0;
  left: 0;
  z-index: 1000;
  background-color: white;
}
</style>
