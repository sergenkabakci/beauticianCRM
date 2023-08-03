/**
 *  Pages Authentication
 */

'use strict';
const formAuthentication = document.querySelector('#formAuthentication');

document.addEventListener('DOMContentLoaded', function (e) {
  (function () {
    // Form validation for Add new record
    if (formAuthentication) {
      const fv = FormValidation.formValidation(formAuthentication, {
        fields: {
          username: {
            validators: {
              notEmpty: {
                message: 'Lütfen e-posta adresinizi veya kullanıcı adınızı giriniz'
              },
              stringLength: {
                min: 6,
                message: 'Kullanıcı adı en az 6 karakter olmalıdır'
              }
            }
          },
          email: {
            validators: {
              notEmpty: {
                message: 'Lütfen e-posta adresinizi veya kullanıcı adınızı giriniz'
              },
              emailAddress: {
                message: 'Lütfen geçerli bir e-posta adresi giriniz'
              }
            }
          },
          'email-username': {
            validators: {
              notEmpty: {
                message: 'Lütfen e-posta adresinizi veya kullanıcı adınızı giriniz'
              },
              stringLength: {
                min: 6,
                message: 'Kullanıcı adı en az 6 karakter olmalıdır'
              }
            }
          },
          password: {
            validators: {
              notEmpty: {
                message: 'Lütfen şifrenizi giriniz'
              },
              stringLength: {
                min: 6,
                message: 'Şifre en az 6 karakter olmalıdır'
              }
            }
          },
          'confirm-password': {
            validators: {
              notEmpty: {
                message: 'Please confirm password'
              },
              identical: {
                compare: function () {
                  return formAuthentication.querySelector('[name="password"]').value;
                },
                message: 'The password and its confirm are not the same'
              },
              stringLength: {
                min: 6,
                message: 'Password must be more than 6 characters'
              }
            }
          },
          terms: {
            validators: {
              notEmpty: {
                message: 'Please agree terms & conditions'
              }
            }
          }
        },
        plugins: {
          trigger: new FormValidation.plugins.Trigger(),
          bootstrap5: new FormValidation.plugins.Bootstrap5({
            eleValidClass: '',
            rowSelector: '.mb-3'
          }),
          submitButton: new FormValidation.plugins.SubmitButton(),

          defaultSubmit: new FormValidation.plugins.DefaultSubmit(),
          autoFocus: new FormValidation.plugins.AutoFocus()
        },
        init: instance => {
          instance.on('plugins.message.placed', function (e) {
            if (e.element.parentElement.classList.contains('input-group')) {
              e.element.parentElement.insertAdjacentElement('afterend', e.messageElement);
            }
          });
        }
      });
    }

    //  Two Steps Verification
    const numeralMask = document.querySelectorAll('.numeral-mask');

    // Verification masking
    if (numeralMask.length) {
      numeralMask.forEach(e => {
        new Cleave(e, {
          numeral: true
        });
      });
    }
  })();
});
