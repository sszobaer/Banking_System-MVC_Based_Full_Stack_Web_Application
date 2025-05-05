//Zobaer
let profilePhotoValidation = () => {
  const profilePhoto = document.getElementById("profile-photo");
  const profilePhotoError = document.getElementById("profilePhotoError");
  const photoFile = profilePhoto.files[0];
  const isValidImg = ["image/jpg", "image/jpeg", "image/png"];

  if (!photoFile) {
    profilePhotoError.textContent = "Profile photo is required";
    profilePhotoError.style.color = "red";
    return false;
  } else if (!isValidImg.includes(photoFile.type)) {
    profilePhotoError.textContent = "Only jpg, jpeg, or png format are allowed";
    profilePhotoError.style.color = "red";
    return false;
  } else {
    profilePhotoError.textContent = "";
    return true;
  }
};

document
  .getElementById("profile-change-btn")
  .addEventListener("click", (event) => {
    event.preventDefault();
    if (profilePhotoValidation()) {
      alert("Your profile has been changed");
      window.location.href = "userProfile.html";
    }
  });
