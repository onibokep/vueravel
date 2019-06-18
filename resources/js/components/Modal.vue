<template>
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="eArticle">
            <div class="form-row form-group">
              <label for="editId" class="control-label col-sm-3">Article Id</label>
              <div class="col-sm-8">
                <input type="text" class="form-control editId" readonly>
              </div>
            </div>
            <div class="form-row form-group">
              <label for="editTitle" class="control-label col-sm-3">Article Title</label>
              <div class="col-sm-8">
                <input type="text" class="form-control editTitle">
              </div>
            </div>
            <div class="form-row form-group">
              <label for="editContent" class="control-label col-sm-3">Article Content</label>
              <div class="col-sm-8">
                <input type="text" class="form-control editContent">
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" @click="update" id="sc-btn">Save changes</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      //
    }
  },
  methods: {
    update(id, title, content) {
      this.$emit('update', 
                  window.$('.editId').val(), 
                  window.$('.editTitle').val(), 
                  window.$('.editContent').val());
    }
  },
  props: ['id', 'title', 'content']
}
</script>