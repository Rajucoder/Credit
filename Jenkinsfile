node {
    try {
	cleanWs()
        stage ('Clone') {
	withCredentials([gitUsernamePassword(credentialsId: 'Raju', gitToolName: 'Default')])  {
	git branch: 'master', credentialsId: 'Raju', url: 'https://github.com/Rajucoder/Credit.git'
	previousTag = sh(returnStdout:  true, script: "git describe --tags `git rev-list --tags --max-count=1`").trim()
	latestTag = sh(returnStdout:  true, script: "git describe --tags `git rev-list --tags --max-count=1`").trim()+"-init"
	merge = MERGED
	sha = GIT_SHA
	tag = previousTag.split("-")[0]
	sh """
		git config --global user.email "rajeshwarinadar721@gmail.com"
		git config --global user.name "Rajucoder"
		git clone --branch master https://github.com/Rajucoder/Credit.git
		cd Credit
		if [ ${merge} == false ] ; then
			echo "creating new Tag for previous version"
			git tag -a '${tag}-${GIT_BRANCH}-final' `git rev-list -n 1 '${previousTag}'` -m "Retagging the older commit"
			git push origin '${previousTag}-final'
		fi
		echo "Creating new Tag for latest version"
		git status
		if [ ${merge} == true ] ; then
			echo "creating new Tag for latest Version"
			git tag -a '${latestTag}' -m "Release of new Version"
			git push origin '${latestTag}'
			echo "Tag pushed to remote"
		fi
	"""
		//Hell0
        }
}
    } catch (err) {
        currentBuild.result = 'FAILED'
        throw err
    }
} 
