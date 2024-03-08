<template>
    <default-field :field="field" :errors="errors" full-width-content>
      <template #field>
        <input :id="field.name" type="hidden" v-model="value">
        <div class="w-full overflow-hidden">
          <div class="overflow-x-auto">
            <table class="table_field">
              <tbody class="table_field__body">
                <tr class="table_field__row" v-for="(row, index) in data" :key="index">
                  <td class="table_field__column">
                    <div class="table_field__buttons">{{ index + 1 }}</div>
                  </td>
                  <td class="table_field__column" v-for="(column, subindex) in row" :key="subindex">
                    <div class="table_field__heading" v-if="index === 0">
                      <button class="table_field__button table_field__button--add" type="button"
                        :title="addColumnButtonLabel" @click.prevent="addColumn(subindex)">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24">
                          <path d="M0 0h24v24H0V0z" fill="none" />
                          <path
                            d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm4 11h-3v3c0 .55-.45 1-1 1s-1-.45-1-1v-3H8c-.55 0-1-.45-1-1s.45-1 1-1h3V8c0-.55.45-1 1-1s1 .45 1 1v3h3c.55 0 1 .45 1 1s-.45 1-1 1z" />
                        </svg>
                      </button>
                      <input class="table_field__input form-input form-input-bordered" type="text" :value="column" size="7"
                        @keyup="changeValue($event, index, subindex)" v-if="headersDropdowns.length < 1">
                      <select @change="changeValue($event, index, subindex)" v-else>
                        <option :value="header" v-for="(header, key) in headersDropdowns" :key="key"
                          :selected="column === header">
                          {{ header }}
                        </option>
                      </select>
                      <button class="table_field__button table_field__button--remove" type="button"
                        :title="removeColumnButtonLabel" @click.prevent="removeColumn(subindex)">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24">
                          <path d="M0 0h24v24H0V0z" fill="none" />
                          <path
                            d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm4 11H8c-.55 0-1-.45-1-1s.45-1 1-1h8c.55 0 1 .45 1 1s-.45 1-1 1z" />
                        </svg>
                      </button>
                    </div>
                    <div v-else>
                      <input class="table_field__input form-input form-input-bordered" type="text" :value="column" size="7"
                        @keyup="changeValue($event, index, subindex)">
                    </div>
                  </td>
                  <td class="table_field__column">
                    <div class="table_field__buttons table_field__buttons--start" v-if="index === 0">
                      <button class="table_field__button table_field__button--add" type="button"
                        :title="addColumnButtonLabel" @click.prevent="addColumn(columns)">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24">
                          <path d="M0 0h24v24H0V0z" fill="none" />
                          <path
                            d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm4 11h-3v3c0 .55-.45 1-1 1s-1-.45-1-1v-3H8c-.55 0-1-.45-1-1s.45-1 1-1h3V8c0-.55.45-1 1-1s1 .45 1 1v3h3c.55 0 1 .45 1 1s-.45 1-1 1z" />
                        </svg>
                      </button>
                    </div>
                    <div class="table_field__buttons table_field__buttons--col" v-else>
                      <button class="table_field__button table_field__button--add" type="button"
                        :title="addRowButtonLabel" @click.prevent="addRow(index)">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24">
                          <path d="M0 0h24v24H0V0z" fill="none" />
                          <path
                            d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm4 11h-3v3c0 .55-.45 1-1 1s-1-.45-1-1v-3H8c-.55 0-1-.45-1-1s.45-1 1-1h3V8c0-.55.45-1 1-1s1 .45 1 1v3h3c.55 0 1 .45 1 1s-.45 1-1 1z" />
                        </svg>
                      </button>
                      <button class="table_field__button table_field__button--remove" type="button"
                        :title="removeRowButtonLabel" @click.prevent="removeRow(index)">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24">
                          <path d="M0 0h24v24H0V0z" fill="none" />
                          <path
                            d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm4 11H8c-.55 0-1-.45-1-1s.45-1 1-1h8c.55 0 1 .45 1 1s-.45 1-1 1z" />
                        </svg>
                      </button>
                    </div>
                  </td>
                </tr>
                <tr class="table_field__row">
                  <td class="table_field__column"></td>
                  <td class="table_field__column" :colspan="columns"></td>
                  <td class="table_field__column">
                    <div class="table_field__buttons table_field__buttons--col table_field__buttons--start">
                      <button class="table_field__button table_field__button--add" type="button"
                        :title="addRowButtonLabel" @click.prevent="addRow(rows)">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24">
                          <path d="M0 0h24v24H0V0z" fill="none" />
                          <path
                            d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm4 11h-3v3c0 .55-.45 1-1 1s-1-.45-1-1v-3H8c-.55 0-1-.45-1-1s.45-1 1-1h3V8c0-.55.45-1 1-1s1 .45 1 1v3h3c.55 0 1 .45 1 1s-.45 1-1 1z" />
                        </svg>
                      </button>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </template>
    </default-field>
  </template>

  <script>
    import { FormField, HandlesValidationErrors } from "laravel-nova";

    export default {
      mixins: [FormField, HandlesValidationErrors],

      props: ["resourceName", "resourceId", "field"],

      data() {
        return {
          value: "",
          data: [],
          rows: 4,
          columns: 4,
          headers: [],
          headersDropdowns: [],
          addRowButtonLabel: "Add row",
          addColumnButtonLabel: "Add column",
          removeRowButtonLabel: "Remove row",
          removeColumnButtonLabel: "Remove column"
        };
      },

      methods: {
        /*
          * Set the initial, internal value for the field.
          */
        setInitialValue() {
            this.value = this.field.value || "";
            this.rows = this.field.rows || 4;
            this.columns = this.field.columns || 4;
            this.headers = this.field.headers || [];
            this.headersDropdowns = this.field.headersDropdowns || [];
            this.addRowButtonLabel = this.field.addRowButtonLabel || "Add row";
            this.addColumnButtonLabel =
                this.field.addColumnButtonLabel || "Add column";
            this.removeRowButtonLabel =
                this.field.removeRowButtonLabel || "Remove row";
            this.removeColumnButtonLabel =
                this.field.removeColumnButtonLabel || "Remove column";
            for (let index = 0; index < this.columns; index++) {
                if (typeof this.headers[index] === "undefined") {
                    this.headers.push("");
                }
            }
            this.setInitialData();
        },

        /*
          * Set the initial, internal data for the field.
          */
        setInitialData() {
            if (this.value !== "") {
                this.data = JSON.parse(this.value);
                this.rows = this.data.length;
                this.columns = this.data[0].length;
            } else {
                this.data[0] = this.headers;
                for (let index = 1; index < this.rows; index++) {
                    let row = [];
                    for (let subindex = 0; subindex < this.columns; subindex++) {
                        row[subindex] = "";
                    }
                    this.data[index] = row;
                }
                this.value = JSON.stringify(this.data);
            }
        },

        /**
         * Fill the given FormData object with the field's internal value.
         */
        fill(formData) {
            formData.append(this.field.attribute, this.value || "");
        },

        /**
         * Update the field's internal value.
         */
        handleChange(value) {
          this.value = value;
        },

        /**
         * Change the value.
         */
        changeValue(event, row, column) {
          this.data[row][column] = event.target.value;
          this.value = JSON.stringify(this.data);
        },

        /**
         * Add one row.
         */
        addRow(index) {
            let columns = [];
            for (let i = 0; i < this.columns; i++) {
                columns.push('');
            }
            this.data.splice(index, 0, columns);
            this.value = JSON.stringify(this.data);
            this.rows += 1;
        },

        /**
         * Add one column
         */
        addColumn(index) {
          this.data.forEach(row => {
            row.splice(index, 0, '');
          });
          this.value = JSON.stringify(this.data);
          this.columns += 1;
        },

        /**
         * Remove one row.
         */
        removeRow(index) {
            this.data.splice(index, 1);
            this.value = JSON.stringify(this.data);
            this.rows -= 1;
        },

        /**
         * Remove one column
         */
        removeColumn(index) {
          this.data.forEach(row => {
              row.splice(index, 1);
          });
          this.value = JSON.stringify(this.data);
          //this.headers.splice(index, 1);
          this.columns -= 1;
        }
      }
    };
  </script>
