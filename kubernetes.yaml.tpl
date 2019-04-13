apiVersion: v1
kind: Service
metadata:
  name: wordpress
  labels:
    app: wordpress
spec:
  ports:
    - port: 80
      targetPort: 80
  selector:
    app: wordpress
    tier: frontend
---
kind: PersistentVolumeClaim
apiVersion: v1
metadata:
  name: wp-sysrant-claim
spec:
  storageClassName: "nfs"
  accessModes:
    - ReadWriteMany
  resources:
    requests:
      storage: 2Gi
---
apiVersion: apps/v1
kind: Deployment
metadata:
  name: wordpress
  labels:
    app: wordpress
spec:
  replicas: 1
  selector:
    matchLabels:
      app: wordpress
      tier: frontend
  strategy:
    type: Recreate
  template:
    metadata:
      labels:
        app: wordpress
        tier: frontend
    spec:
      securityContext:
        fsGroup: 33
      containers:
        - image: gcr.io/GOOGLE_CLOUD_PROJECT/sysrant:COMMIT_SHA
          name: wordpress
          env:
            - name: DB_NAME
              value: wordpress
            - name: DB_USER
              value: root
            - name: DB_HOST
              value: wordpress-mysql
            - name: DB_CHARSET
              value: utf8
            - name: DB_COLLATE
              value: ''  
            - name: AUTH_KEY
              valueFrom:
                secretKeyRef:
                  name: wordpress-secrets
                  key: AUTH_KEY
            - name: SECURE_AUTH_KEY
              valueFrom:
                secretKeyRef:
                  name: wordpress-secrets
                  key: SECURE_AUTH_KEY
            - name: LOGGED_IN_KEY
              valueFrom:
                secretKeyRef:
                  name: wordpress-secrets
                  key: LOGGED_IN_KEY
            - name: NONCE_KEY
              valueFrom:
                secretKeyRef:
                  name: wordpress-secrets
                  key: NONCE_KEY
            - name: AUTH_SALT
              valueFrom:
                secretKeyRef:
                  name: wordpress-secrets
                  key: AUTH_SALT
            - name: SECURE_AUTH_SALT
              valueFrom:
                secretKeyRef:
                  name: wordpress-secrets
                  key: SECURE_AUTH_SALT
            - name: LOGGED_IN_SALT
              valueFrom:
                secretKeyRef:
                  name: wordpress-secrets
                  key: LOGGED_IN_SALT
            - name: NONCE_SALT
              valueFrom:
                secretKeyRef:
                  name: wordpress-secrets
                  key: NONCE_SALT
            - name: DB_PASSWORD
              valueFrom:
                secretKeyRef:
                  name: wordpress-secrets
                  key: DB_PASSWORD       
          ports:
            - containerPort: 80
              name: wordpress
          volumeMounts:
            - name: wordpress-persistent-storage
              mountPath: /var/www/html/wp-content/uploads  
      volumes:
        - name: wordpress-persistent-storage
          persistentVolumeClaim:
            claimName: wp-sysrant-claim